<?php


namespace App\Models\Employee;


use App\Models\Database;

class EmployeeModel
{
    public function getAllEmployee(){
        $data = $this->getAllEmployeeData();
        return $this->mapData($data);
    }

    public function getAllEmployeeData(){
        $queryString = "SELECT employee_id, employee_name, employee_name_kana, mail_address, password, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag FROM mst_employee WHERE delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                $employee = new Employee();
                if(isset($data)){
                    $employee->setId($data->employee_id ?? NULL);
                    $employee->setName($data->employee_name ?? NULL);
                    $employee->setNameKana($data->employee_name_kana ?? NULL);
                    $employee->setMailAddress($data->mail_address ?? NULL);
                    $employee->setPassword($data->password ?? NULL);
                    $employee->setUpdateDate($data->update_date ?? NULL);
                    $employee->setUpdateUserId($data->update_user_id ?? NULL);
                    $employee->setInsertDate($data->insert_date ?? NULL);
                    $employee->setInsertUserId($data->insert_user_id ?? NULL);
                    $employee->setDeleteFlag($data->delete_flag ?? NULL);
                }
                array_push($mappedData, $employee);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function getEmployeeById($employeeId){
        $data = $this->getEmployeeDataById($employeeId);
        return $this->mapData($data);
    }

    public function getEmployeeDataById($employeeId){
        $queryString = "SELECT employee_id, employee_name, employee_name_kana, mail_address, password, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag FROM mst_employee WHERE employee_id = ? AND delete_flag = ?";
        $queryParameter = array($employeeId, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }
}