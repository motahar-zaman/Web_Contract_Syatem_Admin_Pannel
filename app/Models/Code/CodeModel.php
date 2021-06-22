<?php


namespace App\Models\Code;


use App\Models\Database;

class CodeModel
{
    public function getCodeByCodeValue($codeValue){
        $data = $this->getCodeDataByCodeValue($codeValue);
        return $this->mapData($data);
    }

    public function getCodeDataByCodeValue($codeValue){
        $queryString = "SELECT function_id, group_id, code_id, code_value, function_name, group_name, code_name, sort_order, update_date,
                        update_user_id, insert_date, insert_user_id FROM mst_code WHERE code_value = ?";
        $queryParameter = array($codeValue);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function getCodeByGroupId($groupId){
        $data = $this->getCodeDataByGroupId($groupId);
        return $this->mapData($data);
    }

    public function getCodeDataByGroupId($groupId){
        $queryString = "SELECT function_id, group_id, code_id, code_value, function_name, group_name, code_name, sort_order, update_date,
                        update_user_id, insert_date, insert_user_id FROM mst_code WHERE group_id = ?";
        $queryParameter = array($groupId);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function getCodeByCodeId($codeId){
        $data = $this->getCodeDataByCodeId($codeId);
        return $this->mapData($data);
    }

    public function getCodeDataByCodeId($codeId){
        $queryString = "SELECT function_id, group_id, code_id, code_value, function_name, group_name, code_name, sort_order, update_date,
                        update_user_id, insert_date, insert_user_id FROM mst_code WHERE code_id = ?";
        $queryParameter = array($codeId);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                $code = new Code();
                if(isset($data)){
                    $code->setFunctionId($data->function_id ?? NULL);
                    $code->setGroupId($data->group_id ?? NULL);
                    $code->setCodeId($data->code_id ?? NULL);
                    $code->setCodeValue($data->code_value ?? NULL);
                    $code->setFunctionName($data->function_name ?? NULL);
                    $code->setGroupName($data->group_name ?? NULL);
                    $code->setCodeName($data->code_name ?? NULL);
                    $code->setSortOrder($data->sort_order ?? NULL);
                    $code->setUpdateDate($data->update_date ?? NULL);
                    $code->setUpdateUser($data->update_user_id ?? NULL);
                    $code->setInsertDate($data->insert_date ?? NULL);
                    $code->setInsertUser($data->insert_user_id ?? NULL);
                }
                array_push($mappedData, $code);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }
}