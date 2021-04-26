<?php


namespace App\Controllers\Contractor;


use App\Controllers\BaseController;
use App\Models\Contractor\ContractorModel;

class ContractorController extends BaseController
{
    public function contractorSearch(){
        if( session() && session()->get('login') ){
            $contractor = (new ContractorModel())->getAllContractorData();
            return view("contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}