<?php



namespace App\Models\Common;



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
    }
}