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
        $sequence = contractor_user_prefix;

        return $sequence;
    }

    public function getSequenceRules(){
        $queryString = "SELECT prefix, sequence, increment FROM mng_sequence";

        return (new Database())->readQueryExecution($queryString);
    }

    public function getEmployeeLastSequence(){
        $queryString = "SELECT contractor_id, insert_date FROM mst_contractor ORDER BY insert_date DESC";

        return (new Database())->readQueryExecution($queryString);
    }
}