<?php

namespace App\Models;

class Database
{
    public function queryExecution($query, $parameter = NULL){
        $db = \Config\Database::connect();
        return $db->query($query, $parameter)->getResult();
    }
}