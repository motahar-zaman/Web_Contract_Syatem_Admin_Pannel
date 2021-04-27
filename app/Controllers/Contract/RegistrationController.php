<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Common\SequenceModel;
use App\Models\Company\CompanyModel;
use App\Models\Contractor\ContractorModel;
use App\Models\Group\GroupModel;

class RegistrationController extends BaseController
{
    public function index(){
        if( session() && session()->get('login') ){
            $group = (new GroupModel())->getAllGroupData();
            $company = (new CompanyModel())->getAllCompanyData();
            $contractor = (new ContractorModel())->getAllContractorData();

            return view("Contract/contract", ["title" => "Contract Registration", "group" => $group, "company" => $company,
                "contractor" => $contractor]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}