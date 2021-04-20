<?php



namespace App\Models\Common;



use App\Models\Database;

class SequenceModel
{
    public function getEmployeeSequence(){
        $sequence = k1_employee_user_prefix;

        return $sequence;
    }

    public function getContractorSequence(){
        $contractorPrefix = contractor_user_prefix;
        $contractor = $this->getContractorLastSequence();
        $contractorSequence = $this->getSequenceRules($contractorPrefix);
        $increment = $contractorSequence->increment;
        $sequence = $contractorSequence->sequence;
        $lastSequence = $contractor->contractor_id;
        $user = explode("_",$lastSequence);

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