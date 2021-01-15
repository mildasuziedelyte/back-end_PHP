<?php

namespace Darzas;

class Cache {

    private $data;
    private $catcheTime = 10;

    public function __construct()
    {
        if (file_exists('C:\xampp\htdocs\paskaitos\1223agurkai-copy0114\data\rates.json')) {
            $this->data = json_decode(file_get_contents('C:\xampp\htdocs\paskaitos\1223agurkai-copy0114\data\rates.json'));
        }
    }

    public function get()
    {
        if (null === $this->data) {
            return false;
        }
        
        if ($this->data->timeStamp + $this->catcheTime <= time()) {
            return false;
        }

        return $this->data;
    }

    public function set(object $data)
    {
        $data->timeStamp = time();
        file_put_contents('C:\xampp\htdocs\paskaitos\1223agurkai-copy0114\data\rates.json', json_encode($data));
    }

}