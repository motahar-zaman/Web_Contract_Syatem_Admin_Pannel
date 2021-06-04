<?php

namespace App\Controllers\Contractor;

use App\Controllers\BaseController;
use App\Models\Common\SequenceModel;
use App\Models\Company\Company;
use App\Models\Company\CompanyModel;
use App\Models\Contractor\Contractor;
use App\Models\Contractor\ContractorModel;
use App\Models\Group\Group;
use App\Models\Group\GroupModel;

class RegistrationController extends BaseController
{
    public function testMethod(){
        echo (new SequenceModel())->getShopSequence();
        echo "<br>";
        echo (new SequenceModel())->getContractSequence();
        echo "<br>";
        echo (new SequenceModel())->getEmployeeSequence();
        echo "<br>";
        echo (new SequenceModel())->getContractorSequence();
        echo "<br>";
        echo (new SequenceModel())->getCompanySequence();
        echo "<br>";
        echo (new SequenceModel())->getGroupSequence();
    }

    public function index(){
        if( session() && session()->get('login') ){
            $userType = 0;
            if(session()->get("user") == "contractor"){
                $userType = 1;
            }

            $group = (new GroupModel())->getAllGroupData();
            $company = (new CompanyModel())->getAllCompanyData();
            $contractor = (new ContractorModel())->getAllContractorData($userType, session()->get("userId"));
            $contractorId = (new SequenceModel())->getContractorSequence();
            $companyId = (new SequenceModel())->getCompanySequence();
            $groupId = (new SequenceModel())->getGroupSequence();

            $idMappedGroup = (new GroupModel())->mapDataByKeyValue($group);
            $idMappedCompany = (new CompanyModel())->mapDataByKeyValue($company);

            $data = array(
                "title" => "Contractor Registration-Update",
                "group" => $group,
                "company" => $company,
                "contractor" => $contractor,
                "contractorId" => $contractorId,
                "companyId" => $companyId,
                "groupId" => $groupId,
                "idMappedGroup" => $idMappedGroup,
                "idMappedCompany" => $idMappedCompany,
                "store" => "insert"
            );

            return view("Contractor/contractor", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function tempRegistration(){
        if( session() && session()->get('login') && session()->get('user') == "employee" ){
            $group = (new GroupModel())->getAllGroupData();
            $company = (new CompanyModel())->getAllCompanyData();
            $contractorId = (new SequenceModel())->getContractorSequence();
            $companyId = (new SequenceModel())->getCompanySequence();
            $groupId = (new SequenceModel())->getGroupSequence();

            $data = array(
                "title" => "Temporary Contractor Registration",
                "group" => $group,
                "company" => $company,
                "contractorId" => $contractorId,
                "companyId" => $companyId,
                "groupId" => $groupId,
                "store" => "insert"
            );
            return view("Contractor/temp_contractor", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                $contractor = new Contractor();
                $company = new Company();
                $group = new Group();

                $contractor->setName($_POST['contractorName']);
                $contractor->setNameKana($_POST['contractorKana']);
                $contractor->setPassword("abcde");              //set a default password
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
                $contractor->setDeleteFlag(1);


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
                $company->setDeleteFlag(1);

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
                $group->setDeleteFlag(1);

                $contractorInsert = $_POST["contractorInsert"];
                $companyInsert = $_POST["companyInsert"];
                $groupInsert = $_POST["groupInsert"];

                if($groupInsert == "insert"){
                    $group->setId((new SequenceModel())->getGroupSequence());
                    $storeGroup = (new GroupModel())->storeGroupData($group);
                }
                else{
                    $group->setId($_POST["groupId"]);
                    (new GroupModel())->updateGroupData($group);
                    $storeGroup = true;
                }

                if($companyInsert == "insert"){
                    $company->setId((new SequenceModel())->getCompanySequence());
                    $storeCompany = (new CompanyModel())->storeCompanyData($company);
                }
                else{
                    $company->setId($_POST["companyId"]);
                    (new CompanyModel())->updateCompanyData($company);
                    $storeCompany = true;
                }

                $contractor->setCompanyId($company->getId());
                $contractor->setGroupId($group->getId());
                if($contractorInsert == "insert"){
                    $contractor->setId((new SequenceModel())->getContractorSequence());
                    $storeContractor = (new ContractorModel())->storeContractorData($contractor);
                }
                else{
                    $contractor->setId($_POST["contractorId"]);
                    (new ContractorModel())->updateContractorData($contractor);
                    $storeContractor = true;
                }

                if($storeContractor && $storeCompany && $storeGroup){
                    return json_encode(['msg' => "Successful", "contractor" => $contractor->getId(), "status" => 1]);
                }
                else{
                    $deleteContractor = (new ContractorModel())->deleteData($contractor->getId());
                    $deleteCompany = (new CompanyModel())->deleteData($company->getId());
                    $deleteGroup = (new GroupModel())->deleteData($group->getId());

                    return json_encode(['msg' => "Something went wrong and rollback", 'status' => 0]);
                }
            }
            else{
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }

    public function update($contractorId){
        if( session() && session()->get('login') ){
            $userType = 0;
            if(session()->get("user") == "contractor"){
                $userType = 1;
            }

            $group = (new GroupModel())->getAllGroupData();
            $company = (new CompanyModel())->getAllCompanyData();
            $contractor = (new ContractorModel())->getAllContractorData($userType, session()->get("userId"));
            $editContractorDetails = (new ContractorModel())->getContractorDetailsById($contractorId);

            $idMappedGroup = (new GroupModel())->mapDataByKeyValue($group);
            $idMappedCompany = (new CompanyModel())->mapDataByKeyValue($company);

            $data = array(
                "title" => "Update Contractor Information",
                "group" => $group,
                "company" => $company,
                "contractor" => $contractor,
                "idMappedGroup" => $idMappedGroup,
                "idMappedCompany" => $idMappedCompany,
                "editContractorDetails" => $editContractorDetails[0],
                "store" => "update"
            );

            return view("Contractor/contractor", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function updateAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                $contractor = new Contractor();
                $company = new Company();
                $group = new Group();

                $contractor->setId($_POST["contractorId"]);
                $contractor->setName($_POST['contractorName']);
                $contractor->setNameKana($_POST['contractorKana']);
                $contractor->setZipCode($_POST['contractorPostCode']);
                $contractor->setAddress01($_POST['contractorAddress1']);
                $contractor->setAddress02($_POST['contractorAddress2']);
                $contractor->setTelNo($_POST['contractorPhn']);
                $contractor->setMailAddress($_POST['contractorMail']);
                $contractor->setCompanyId($_POST["companyId"]);
                $contractor->setGroupId($_POST["groupId"]);
                $contractor->setUpdateDate(date("Y-m-d H:i:s"));
                $contractor->setUpdateUserId(session()->get('userId'));

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

                (new GroupModel())->updateGroupData($group);
                (new CompanyModel())->updateCompanyData($company);
                (new ContractorModel())->updateContractorData($contractor);

                return json_encode(['msg' => "Successful", "contractor" => $contractor->getId(), 'status' => 1]);
            }
            else{
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }
}