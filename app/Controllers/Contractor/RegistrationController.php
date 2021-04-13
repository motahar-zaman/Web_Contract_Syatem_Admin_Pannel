<?php

namespace App\Controllers\Contractor;

use App\Controllers\BaseController;
use App\Models\Company\Company;
use App\Models\Company\CompanyModel;
use App\Models\Contractor\Contractor;
use App\Models\Contractor\ContractorModel;
use App\Models\Group\Group;
use App\Models\Group\GroupModel;

class RegistrationController extends BaseController
{
    public function index(){
        if( session() && session()->get('login') ){
            return view("template/pages/forms/contractor", ["title" => "Contractor Registration"]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
            $contractor = new Contractor();
            $company = new Company();
            $group = new Group();

            $contractor->setId($_POST['contractorId']);
            $contractor->setName($_POST['contractorName']);
            $contractor->setNameKana($_POST['contractorKana']);
            $contractor->setPassword("abCde");              //set a default password
            $contractor->setZipCode($_POST['contractorPostCode']);
            $contractor->setAddress01($_POST['contractorAddress1']);
            $contractor->setAddress02($_POST['contractorAddress2']);
            $contractor->setTelNo($_POST['contractorPhn']);
            $contractor->setMailAddress($_POST['contractorMail']);
            $contractor->setType("01");
            $contractor->setUpdateDate(date("Y-m-d H:i:s"));
            $contractor->setUpdateUserId(session()->get('userId'));
            $contractor->setInsertDate(date("Y-m-d H:i:s"));
            $contractor->setInsertUserId(session()->get('userId'));
            $contractor->setDeleteFlag(0);
            if($_POST['temporary'] == "YES"){
                $contractor->setTemporary(1);
            }
            else{
                $contractor->setTemporary(0);
            }

            $company->setId($_POST["companyId"]);
            $company->setName($_POST["companyName"]);
            $company->setNameKana($_POST["companyKana"]);
            $company->setRepresentative($_POST["companyRepresentative"]);
            $company->setRepresentativeKana($_POST["companyRepresentativeKana"]);
            $company->setZipCode($_POST["companyPostCode"]);
            $company->setAddress01($_POST["companyAddress1"]);
            $company->setAddress02($_POST["companyAddress2"]);
            $company->setTelNo($_POST["companyPhn"]);
            $company->setMailAddress($_POST["companyMail"]);
            $company->setUpdateDate(date("Y-m-d H:i:s"));
            $company->setUpdateUserId(session()->get('userId'));
            $company->setInsertDate(date("Y-m-d H:i:s"));
            $company->setInsertUserId(session()->get('userId'));
            $company->setDeleteFlag(0);

            $group->setId($_POST["groupId"]);
            $group->setName($_POST["groupName"]);
            $group->setNameKana($_POST["groupKana"]);
            $group->setRepresentative($_POST["groupRepresentative"]);
            $group->setRepresentativeKana($_POST["groupRepresentativeKana"]);
            $group->setZipCode($_POST["groupPostCode"]);
            $group->setAddress01($_POST["groupAddress1"]);
            $group->setAddress02($_POST["groupAddress2"]);
            $group->setTelNo($_POST["groupPhn"]);
            $group->setMailAddress($_POST["groupMail"]);
            $group->setUpdateDate(date("Y-m-d H:i:s"));
            $group->setUpdateUserId(session()->get('userId'));
            $group->setInsertDate(date("Y-m-d H:i:s"));
            $group->setInsertUserId(session()->get('userId'));
            $group->setDeleteFlag(0);

            (new ContractorModel())->storeContractorData($contractor);
            (new CompanyModel())->storeCompanyData($company);
            (new GroupModel())->storeGroupData($group);

            return json_encode(['msg' => "Successful", 'status' => 1]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function tempRegistration(){
        if( session() && session()->get('login') && session()->get('user') == "employee" ){
            return view("template/pages/forms/temp_contractor", ["title" => "Temporary Contractor Registration"]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}