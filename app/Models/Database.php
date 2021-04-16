<?php

namespace App\Models;

class Database
{
    public function writeQueryExecution($query, $parameter = NULL){
        $db = \Config\Database::connect();
        return $db->query($query, $parameter);
    }

    public function readQueryExecution($query, $parameter = NULL){
        $db = \Config\Database::connect();
        return $db->query($query, $parameter)->getResult();
    }
}