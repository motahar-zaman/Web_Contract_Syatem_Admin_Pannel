<?php

namespace App\Models;

use Exception;

class Database
{
    public function writeQueryExecution($query, $parameter = NULL){
        $db = \Config\Database::connect();
        try{
            return $db->query($query, $parameter);
        }
        catch(Exception $e)
        {
            return null;
        }
    }

    public function readQueryExecution($query, $parameter = NULL){
        $db = \Config\Database::connect();
        try{
            return $db->query($query, $parameter)->getResult();
        }
        catch(Exception $e)
        {
            return null;
        }
    }
}