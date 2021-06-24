<?php

namespace App\Models\Authentication;

use App\Models\Database;

class AuthModel
{
    public function loginEmployee($userId, $password){
        $queryString = "SELECT employee_id, employee_name, employee_name_kana, department, update_date, update_user_id, insert_date, insert_user_id, delete_flag 
                        FROM mst_employee WHERE employee_id = ? AND password = ? AND delete_flag = ? ";
        $queryParameter = array($userId, $password, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function loginContractor($userId, $password){
        $queryString = "SELECT contractor_id, contractor_name, contractor_name_kana, zipcode, address_01, address_02, tel_no, fax_no, mail_address, type_contractor, update_date,
                        update_user_id, insert_date, insert_user_id, delete_flag  FROM mst_contractor WHERE contractor_id = ? AND password = ? AND delete_flag = ? ";
        $queryParameter = array($userId, $password, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }
}