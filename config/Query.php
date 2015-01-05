<?php namespace Panyar;

interface Query{

    public function fetchAll();
    public function fetchByName($name);
    public function fetchById($id);

}
    
