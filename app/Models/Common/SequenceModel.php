<?php


namespace App\Models\Common;


use App\Models\Database;

class SequenceModel
{
    public function getEmployeeSequence(){
        $employeePrefix = k1_employee_user_prefix;
        $employee = $this->getEmployeeLastSequence();
        $employeeSequence = $this->getSequenceRules($employeePrefix);
        $increment = $employeeSequence->increment;
        $sequence = $employeeSequence->sequence;
        if($employee){
            $id = explode("_",$employee->employee_id);
        }
        else{
            $id[1] = 0;
        }
        $newId = sprintf("%05d", $id[1]+$increment);

        $newSequence = $employeePrefix."_".$newId;

        return $newSequence;
    }

    public function getContractorSequence(){
        $contractorPrefix = contractor_user_prefix;
        $contractor = $this->getContractorLastSequence();
        $contractorSequence = $this->getSequenceRules($contractorPrefix);
        $increment = $contractorSequence->increment;
        $sequence = $contractorSequence->sequence;
        if($contractor){
            $id = explode("_",$contractor->contractor_id);
        }
        else{
            $id[1] = 0;
        }
        $newId = sprintf("%05d", $id[1]+$increment);

        $newSequence = $contractorPrefix."_".$newId;
        return $newSequence;
    }

    public function getContractSequence(){
        $contractPrefix = contract_user_prefix;
        $contract = $this->getContractLastSequence();
        $contractorSequence = $this->getSequenceRules($contractPrefix);
        $increment = $contractorSequence->increment;
        $sequence = $contractorSequence->sequence;
        if($contract){
            $id = explode("_",$contract->contract_id);
        }
        else{
            $id[1] = 0;
        }
        $newId = sprintf("%05d", $id[1]+$increment);

        $newSequence = $contractPrefix."_".$newId;
        return $newSequence;
    }

    public function getCompanySequence(){
        $prefix = date("Ymd");
        $increment = 1;
        $company = $this->getCompanyLastSequence();
        if($company){
            $id = substr($company->company_id, -4);
        }
        else{
            $id = 0;
        }
        $newId = sprintf("%04d", $id+$increment);
        $newSequence = $prefix.$newId;

        return $newSequence;
    }

    public function getGroupSequence(){
        $prefix = date("Ymd");
        $increment = 1;
        $group = $this->getGroupLastSequence();
        if($group){
            $id = substr($group->group_id, -4);
        }
        else{
            $id = 0;
        }
        $newId = sprintf("%04d", $id+$increment);
        $newSequence = $prefix.$newId;

        return $newSequence;
    }

    public function getShopSequence(){
        $prefix = date("Ymd");
        $increment = 1;
        $shop = $this->getShopLastSequence();
        if($shop){
            $id = substr($shop->shop_id, -4);
        }
        else{
            $id = 0;
        }
        $newId = sprintf("%04d", $id+$increment);
        $newSequence = $prefix.$newId;

        return $newSequence;
    }

    public function getSequenceRules($prefix){
        $queryString = "SELECT prefix, sequence, increment FROM mng_sequence WHERE prefix = ?";
        $parameter = array($prefix);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getContractorLastSequence(){
        $queryString = "SELECT contractor_id, insert_date FROM mst_contractor ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getEmployeeLastSequence(){
        $queryString = "SELECT employee_id, insert_date FROM mst_employee ORDER BY insert_date DESC  LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getCompanyLastSequence(){
        $queryString = "SELECT company_id, insert_date FROM mst_company ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getGroupLastSequence(){
        $queryString = "SELECT group_id, insert_date FROM mst_group ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getContractLastSequence(){
        $queryString = "SELECT contract_id, insert_date FROM trn_web_contract_base ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }

    public function getShopLastSequence(){
        $queryString = "SELECT shop_id, insert_date FROM mst_shop ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
    }
}