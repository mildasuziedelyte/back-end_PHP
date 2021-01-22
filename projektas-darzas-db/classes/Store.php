<?php

namespace Darzas;

interface Store{

    function getAll();
    function getNewId();
    function plant($type);
    function addNewVegetable(Vegetable $newVegetable);
    function remove($id);
    function newVegs();
    function grow();
    function removeErr();
    function updatePrice($rate);
    function pick($id, $kiekis);
    function pickAllfromBush($id);
    function pickAll();
      
}