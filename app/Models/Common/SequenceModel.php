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
        $lastSequence = $employee->employee_id;
        $user = explode("_",$lastSequence);

        $newSequence = $employeePrefix."_0000".($user[1]+$increment);

        return $newSequence;
    }

    public function getContractorSequence(){
        $contractorPrefix = contractor_user_prefix;
        $contractor = $this->getContractorLastSequence();
        $contractorSequence = $this->getSequenceRules($contractorPrefix);
        $increment = $contractorSequence->increment;
        $sequence = $contractorSequence->sequence;
        $lastSequence = $contractor->contractor_id;
        $user = explode("_0000",$lastSequence);

        $newSequence = $contractorPrefix."_".($user[1]+$increment);

        return $newSequence;
    }

    public function getSequenceRules($prefix){
        $queryString = "SELECT prefix, sequence, increment FROM mng_sequence WHERE prefix = ?";
        $parameter = array($prefix);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        return $data[0];
    }

    public function getContractorLastSequence(){
        $queryString = "SELECT contractor_id, insert_date FROM mst_contractor ORDER BY insert_date DESC LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        return $data[0];
    }

    public function getEmployeeLastSequence(){
        $queryString = "SELECT employee_id, insert_date FROM mst_employee ORDER BY insert_date DESC  LIMIT ?";
        $parameter = array(1);

        $data = (new Database())->readQueryExecution($queryString, $parameter);
        return $data[0];
    }
}