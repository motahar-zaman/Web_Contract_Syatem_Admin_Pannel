<?php

namespace App\Controllers\Contractor;

use App\Controllers\BaseController;
use App\Models\Contractor\Contractor;
use App\Models\Contractor\RegistrationModel;

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
            $contractor->setId($_POST['contractorId']);
            $contractor->setName($_POST['contractorName']);
            $contractor->setNameKana($_POST['contractorKana']);
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

            $companyId = $_POST["companyId"];
            $companyName = $_POST["companyName"];
            $companyKana = $_POST["companyKana"];
            $companyRepresentative = $_POST["companyRepresentative"];
            $companyRepresentativeKana = $_POST["companyRepresentativeKana"];
            $companyPostCode = $_POST["companyPostCode"];
            $companyAddress1 = $_POST["companyAddress1"];
            $companyAddress2 = $_POST["companyAddress2"];
            $companyPhn = $_POST["companyPhn"];
            $companyMail = $_POST["companyMail"];

            $groupId = $_POST["groupId"];
            $groupName = $_POST["groupName"];
            $groupKana = $_POST["groupKana"];
            $groupRepresentative = $_POST["groupRepresentative"];
            $groupRepresentativeKana = $_POST["groupRepresentativeKana"];
            $groupPostCode = $_POST["groupPostCode"];
            $groupAddress1 = $_POST["groupAddress1"];
            $groupAddress2 = $_POST["groupAddress2"];
            $groupPhn = $_POST["groupPhn"];
            $groupMail = $_POST["groupMail"];

            (new RegistrationModel())->storeContractorData($contractor);

            return json_encode(['msg' => "Successful", 'status' => 1]);

            /*return json_encode([
                'contractorId' => $contractor->getId(),
                'contractorName' => $contractor->getName(),
                'contractorKana' => $contractor->getNameKana(),
                'contractorPostCode' => $contractor->getZipCode(),
                'contractorAddress1' => $contractor->getAddress01(),
                'contractorAddress2' => $contractor->getAddress02(),
                'contractorPhn' => $contractor->getTelNo(),
                'contractorMail' => $contractor->getMailAddress()
            ]);*/
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

    public function tempRegistrationAction(){
        if( session() && session()->get('login') && session()->get('user') == "employee" ){
        }
        else{
            return redirect()->to("/login");
        }
    }
}