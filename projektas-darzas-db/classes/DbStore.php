<?php

namespace Darzas;

use PDO;

class DbStore implements Store{

    private $pdo;

    public function __construct($type){

        $host = '127.0.0.1';
        $db   = 'darzas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);

    }

    public function getAll(){
        $sql = "SELECT * FROM `darzas`;";

        $stmt = $this->pdo->query($sql);

        $masyvas = [];
        
        while ($row = $stmt->fetch()){
            if ($row['type'] == 'Agurkas'){
                $obj = new Agurkas(null);
            }
            if ($row['type'] == 'Pomidoras'){
                $obj = new Pomidoras(null);
            }
            // _d($obj);
            $obj->id = $row['id'];
            $obj->type = $row['type'];
            $obj->count = $row['count'];
            $obj->newVegetables = $row['newVegetables'];
            $obj->img = $row['img'];
            $obj->priceEUR = $row['priceEUR'];
            $obj->priceUSD = $row['priceUSD'];
            $obj->error = $row['error'];
            $masyvas[] = $obj;
        }
        return $masyvas;
    }

    // function setData();
    function getNewId(){
        return null;
    }

    public function plant($type){
        if ($type == 'Agurkas'){
            $newVegetable = new Agurkas (null);
        }
        if ($type == 'Pomidoras'){
            $newVegetable = new Pomidoras (null);
        }
        $sql = "INSERT INTO `darzas` (`type`, `count`, `newVegetables`, `img`, `priceEUR`, `priceUSD`, `error`)
        VALUES ('$type', '$newVegetable->count', '$newVegetable->newVegetables', '$newVegetable->img', '$newVegetable->priceEUR', '$newVegetable->priceUSD', '$newVegetable->error');";

        $this->pdo->query($sql);
    }

    function remove($id){
        $sql = "DELETE FROM darzas
        WHERE `id`='".$id."';";

        $this->pdo->query($sql);

    }

    public function addNewVegetable(Vegetable $newVegetable){
        $sql = "INSERT INTO `darzas` (`type`, `count`, `newVegetables`, `img`, `priceEUR`, `priceUSD`, `error`)
        VALUES ('$newVegetable->type', '.$newVegetable->count.', '.$newVegetable->newVegetables.', '$newVegetable->img', '$newVegetable->priceEUR.', '.$newVegetable->priceUSD.', '$newVegetable->error');";

        $this->pdo->query($sql);
    }

    public function updatePrice($rate){
        foreach ($this->getAll() as $key => &$value){
            $value->setPriceUSD($rate);
            $this->update($value);
       }
       return $this;
    }

    public function update($value){
        $sql = "UPDATE darzas
        SET `id`='$value->id', `type`='$value->type', `count` = '$value->count', `newVegetables` =  '$value->newVegetables', `priceEUR`= '$value->priceEUR', `priceUSD`='$value->priceUSD', `error`='$value->error'
        WHERE `id`='$value->id';";
        $stmt = $this->pdo->query($sql);
    }

    // public function update($id,$priceUSD){

    //     $sql = "UPDATE darzas
    //     SET priceUSD=$priceUSD
    //     WHERE `id`=$id;";

    //     $stmt = $this->pdo->query($sql);

    // }

    public function newVegs(){
        foreach ($this->getAll() as $key => &$value){
            $value->grow();
            $this->update($value);
        }
    }

    public function grow(){
        foreach ($this->getAll() as $key => &$value){
            $value->addVegetables();
            $this->update($value);
        }
    }

    public function removeErr(){
        foreach ($this->getAll() as $key => &$value){
            $value->removeError();
            $this->update($value);
        }
    }

    public function pick($id, $kiekis){
        foreach ($this->getAll() as $index => $value){
            if($value->id == $id){
                if(!is_numeric($kiekis)){
                    $er = 'Įveskite skaičių.';
                    $value->setError($er);
                    $this->update($value);
                } elseif ($kiekis < 0){
                    $er = 'Skaičius turi būti didesnis už 0.';
                    $value->setError($er);
                    $this->update($value);
                } elseif ($kiekis != floor($kiekis)){
                    $er = 'Galima skinti tik po visą agurką, įveskite sveiką skaičių.';
                    $value->setError($er);
                    $this->update($value);
                } elseif($kiekis > $value->count){
                    $antKrumo = $value->count;
                    $er = "Ant krūmo buvo tik $antKrumo. Nuskyniau visus agurkus kuriuos radau.";
                    $value->setError($er);
                    $value->pickVegetables($antKrumo);
                    $this->update($value);
                } else {
                    $value->pickVegetables($kiekis);
                    $this->update($value);
                }    
            }      
        }
    }
    public function pickAllfromBush($id){
            $sql = "UPDATE darzas
            SET `count` = 0
            WHERE `id`='$id';";
            $stmt = $this->pdo->query($sql);
    }

    public function pickAll(){
        foreach($this->getAll() as $index => $value) {
            $value->pickAllFromBush();
            $this->update($value);
        }
    }


    


}