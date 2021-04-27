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
            $contractorId = (new SequenceModel())->getContractorSequence();
            $companyId = (new SequenceModel())->getCompanySequence();
            $groupId = (new SequenceModel())->getGroupSequence();

            return view("Contract/contract", ["title" => "Contractor Registration", "group" => $group, "company" => $company,
                "contractor" => $contractor, "contractorId" => $contractorId, "companyId" => $companyId, "groupId" => $groupId]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}