<?php

namespace Darzas;

class Store {

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

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
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

    public function pick($id){
        foreach ($this->data['myVegetables'] as $index => $value){
            $value = unserialize($value);
            if($value->id == $id){
                $kiekis = $_POST['kiekisSkinti'][$value->id];
                if(!is_numeric($kiekis)){
                    $_SESSION['er']['msg'] = 'Įveskite skaičių.';
                    $_SESSION['er']['id'] = $index;
                } elseif ($kiekis < 0){
                    $_SESSION['er']['msg'] = 'Skaičius turi būti didesnis už 0.';
                    $_SESSION['er']['id'] = $index;
                } elseif ($kiekis != floor($kiekis)){
                    $_SESSION['er']['msg'] = 'Galima skinti tik po visą agurką, įveskite sveiką skaičių.';
                    $_SESSION['er']['id'] = $index;
                } elseif($kiekis > $value->count){
                    $antKrumo = $value->count;
                    $_SESSION['er']['msg'] = "Ant krūmo buvo tik $antKrumo. Nuskyniau visus agurkus kuriuos radau.";
                    $_SESSION['er']['id'] = $index;
                    $value->agurkai = 0;
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



}
