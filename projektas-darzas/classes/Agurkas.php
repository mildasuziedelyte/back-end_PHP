<?php

class Agurkas extends Darzove implements Vegetable{
    protected $type = 'Agurkas';

    public function __construct($id){
        parent::__construct($id);  
        $this->img = './img/'.rand(1,5).'.jpg' ?? './img/1.jpg';
    }

    public function grow(){
        $this->newVegetables = rand(3,6);
    }

}