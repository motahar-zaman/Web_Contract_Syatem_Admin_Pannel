<?php

namespace App\Models;

class Database
{
    public function queryExecution($query){
        $db = \Config\Database::connect();
        return $db->query($query)->getResult();
    }
}