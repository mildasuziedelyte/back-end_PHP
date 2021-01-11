<?php

namespace Darzas;

abstract class Darzove{
    protected $id;
    protected $count;
    protected $img;
    protected $newVegetables = 0;
    protected $type = 'Darzove';

    public function __construct($id){
        $this->id = $id+1;
        $this->count = 0;
        $this->newVegetables = 0;
    }

    public function __get($propertyName){
        return $this->$propertyName;
    }

    public function __set($propertyName, $value){
        $this->$propertyName = $value;
    }

    abstract public function grow();

    public function addVegetables(){
        $this->count = $this->count + $this->newVegetables;
    }

    public function pickVegetables($amount){
        $this->count= $this->count - $amount;
    }

    public function pickAllFromBush(){
        $this->count = 0;
    }
    
}