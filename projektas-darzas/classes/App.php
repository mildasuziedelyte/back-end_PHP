<?php

class App {

    public static function createSession(){
        if(!isset($_SESSION['myVegetables'])){
            $_SESSION['ID'] = 0;
            $_SESSION['myVegetables'] = [];
        }
    }

    public static function redirect($page){
        header('Location: http://localhost/back-end_PHP/projektas-darzas/'. $page.'.php');
        exit;    
    }

    public static function plant($type){
        if ($type == 'Agurkas'){
            $newVegetable = new Agurkas ($_SESSION['ID']);
        }
        if ($type == 'Pomidoras'){
            $newVegetable = new Pomidoras ($_SESSION['ID']);
        }
        // _d($newVegetable->id, 'id');
        $_SESSION['myVegetables'][] = serialize($newVegetable);
        $_SESSION['ID']++;
        App::redirect('sodinimas');

    }

    public static function dig($id){
        foreach ($_SESSION['myVegetables'] as $key => $value){
            $value = unserialize($value);
            if($value->id == $id){
                unset($_SESSION['myVegetables'][$key]);
                App::redirect('sodinimas');
            }
        }
    }

    public static function save($value, $key){
        $value = serialize($value);
        $_SESSION['myVegetables'][$key] = $value;
    }

    public static function grow(){
        foreach ($_SESSION['myVegetables'] as $key => $value){
            $value = unserialize($value);
            $value->addVegetables();
            App::save($value, $key);
        }
        self::redirect('auginimas');
    }

    public static function pick($id){
        foreach ($_SESSION['myVegetables'] as $key => $value){
            $value = unserialize($value);
            if($value->id == $id){
                $kiekis = $_POST['kiekisSkinti'][$value->id];
                if(!is_numeric($kiekis)){
                    $_SESSION['er']['msg'] = 'Įveskite skaičių.';
                    $_SESSION['er']['id'] = $key;
                } elseif ($kiekis < 0){
                    $_SESSION['er']['msg'] = 'Skaičius turi būti didesnis už 0.';
                    $_SESSION['er']['id'] = $key;
                } elseif ($kiekis != floor($kiekis)){
                    $_SESSION['er']['msg'] = 'Galima skinti tik po visą agurką, įveskite sveiką skaičių.';
                    $_SESSION['er']['id'] = $key;
                } elseif($kiekis > $value->count){
                    $antKrumo = $value->count;
                    $_SESSION['er']['msg'] = "Ant krūmo buvo tik $antKrumo. Nuskyniau visus agurkus kuriuos radau.";
                    $_SESSION['er']['id'] = $key;
                    $value->agurkai = 0;
                } else {
                    $value->pickVegetables($kiekis);
                    self::save($value, $key);
                }    
            }      
        }
        self::redirect('skynimas');
    }

    public static function pickAllfromBush($id){
        foreach ($_SESSION['myVegetables'] as $key => $value){
            $value = unserialize($value);
            if($value->id == $_POST['skintiVisus']){
                $value->pickAllFromBush();
                self::save($value, $key);
            }
        }
        self::redirect('skynimas');
    }






}