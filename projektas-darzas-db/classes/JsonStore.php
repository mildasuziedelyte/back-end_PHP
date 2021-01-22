<?php

namespace Darzas;

class JsonStore implements Store {

    private const PATH = DIR.'/data/';

    private $fileName = 'sodas';
    private $data;

    public function __construct($file)
    {
        $this->fileName = $file;
        if (!file_exists(self::PATH.$this->fileName.'.json')) {
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['myVegetables' => [], 'ID' => 0])); // pradinis masyvas
            $this->data = ['myVegetables' => [], 'ID' => 0];
        }
        else {
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json'); // nuskaitom faila
            $this->data = json_decode($this->data, 1); // paverciam masyvu
        }
    }

    public function __destruct()
    {
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data)); // viska vel uzsaugom faile
    }

    public function getNewId()
    {
        $id = $this->data['ID'];
        $this->data['ID']++;
        return $id;
    }

    public function addNewVegetable(Vegetable $newVegetable)
    {
        $this->data['myVegetables'][] = serialize($newVegetable);
    }

    public function getAll()
    {
        $all = [];
        foreach($this->data['myVegetables'] as $value) {
            $all[] = unserialize($value);
        }
        return $all;
    }

    public function plant($type){
        if ($type == 'Agurkas'){
            $newVegetable = new Agurkas ($this->getNewId());
        }
        if ($type == 'Pomidoras'){
            $newVegetable = new Pomidoras ($this->getNewId());
        }
        $this->addNewVegetable($newVegetable);
       
    }

    public function remove($id) {
        foreach($this->data['myVegetables'] as $index => $value) {
            $vegetable = unserialize($value);
            if ($vegetable->id == $id) {
                unset($this->data['myVegetables'][$index]);
            }
        }
    }

    public function newVegs(){
        foreach($this->data['myVegetables'] as $index => $value) {
            $vegetable = unserialize($value);
            $vegetable->grow();
            $this->data['myVegetables'][$index] = serialize($vegetable);
        }
    }

    public function grow(){
        foreach($this->data['myVegetables'] as $index => $value) {
            $vegetable = unserialize($value);
            $vegetable->addVegetables();
            $this->data['myVegetables'][$index] = serialize($vegetable);
        }
    }

    public function pick($id, $kiekis){
        foreach ($this->data['myVegetables'] as $index => $value){
            $value = unserialize($value);
            if($value->id == $id){
                if(!is_numeric($kiekis)){
                    $er = 'Įveskite skaičių.';
                    $value->setError($er);
                    $this->data['myVegetables'][$index] = serialize($value);
                } elseif ($kiekis < 0){
                    $er = 'Skaičius turi būti didesnis už 0.';
                    $value->setError($er);
                    $this->data['myVegetables'][$index] = serialize($value);
                } elseif ($kiekis != floor($kiekis)){
                    $er = 'Galima skinti tik po visą agurką, įveskite sveiką skaičių.';
                    $value->setError($er);
                    $this->data['myVegetables'][$index] = serialize($value);
                } elseif($kiekis > $value->count){
                    $antKrumo = $value->count;
                    $er = "Ant krūmo buvo tik $antKrumo. Nuskyniau visus agurkus kuriuos radau.";
                    $value->setError($er);
                    $value->pickVegetables($antKrumo);
                    $this->data['myVegetables'][$index] = serialize($value);
                } else {
                    $value->pickVegetables($kiekis);
                    $this->data['myVegetables'][$index] = serialize($value);
                }    
            }      
        }
    }

    public function pickAllfromBush($id){
        foreach ($this->data['myVegetables'] as $index => $value){
            $value = unserialize($value);
            if($value->id == $id){
                $value->pickAllFromBush();
                $this->data['myVegetables'][$index] = serialize($value);
            }
        }
    }

    public function pickAll(){
        foreach($this->data['myVegetables'] as $index => $value) {
            $value = unserialize($value);
            $value->pickAllFromBush();
            $this->data['myVegetables'][$index] = serialize($value);
        }
    }

    public function removeErr(){
        foreach($this->data['myVegetables'] as $index => $value) {
            $value = unserialize($value);
            $value->removeError();
            $this->data['myVegetables'][$index] = serialize($value);
        }
    }

    public function updatePrice($rate){
        foreach ($this->getAll() as $key => $value){
            $tmp = $value;
            $this->remove($value->id);
            $tmp->setPriceUSD($rate);
            $this->addNewVegetable($tmp);
        }
        return $this;
    }



}
