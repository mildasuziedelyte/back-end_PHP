<?php

namespace Darzas;

abstract class Darzove{
    protected $id;
    protected $count;
    protected $img;
    protected $newVegetables = 0;
    protected $type = 'Darzove';
    protected $priceEUR;
    protected $priceUSD;
    public $error = '';

    public function __construct($id){
        $this->id = $id+1;
        $this->count = 0;
        $this->newVegetables = 0;
        $this->priceEUR = rand(1,5);
        $this->priceUSD = '';
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

    public function setPriceUSD($rate){
        $this->priceUSD = round($this->priceEUR*$rate, 2);
    }

    public function setError($er){
        $this->error = $er;
    }

    public function removeError(){
        $this->error = '';
    }
    
    
}