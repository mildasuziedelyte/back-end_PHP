<?php

namespace Darzas;

use Darzas\Darzove;
use Darzas\Vegetable;

class Pomidoras extends Darzove implements Vegetable{
    protected $type = 'Pomidoras';

    public function __construct($id){
        parent::__construct($id);  
        $this->img = './img/'.rand(6,10).'.jpg' ?? './img/1.jpg';
    }

    public function grow(){
        $this->newVegetables = rand(7,10);
    }

}