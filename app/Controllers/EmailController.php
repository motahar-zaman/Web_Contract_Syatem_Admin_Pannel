<?php


namespace App\Controllers;


use App\Models\Contractor\ContractorModel;
use App\Models\Employee\EmployeeModel;

class EmailController extends BaseController
{
    public function emailSending($to, $sub, $mess){
        $email = \Config\Services::email();

        $email->setFrom('contact@benri.com.bd', 'WEB契約');
        $email->setTo($to);

        $email->setSubject($sub);
        $email->setMessage($mess);

        if($email->send()){
            return true;
        }
        else{
            $data = $email->printDebugger(["headers"]);
            print_r($data);
            return false;
        }
    }

    public function emailToContractor($contractorId, $contractId){
        $contractorDetails = (new ContractorModel())->getContractorDetailsById($contractorId);

        $toEmail = $contractorDetails[0]->mail_address;
        $toName = $contractorDetails[0]->contractor_name;
        $contractUrl = BASE_URL."/contract-details/".$contractId;
        $body = view("Emails/ContractUpdateMailToContractor", ['contractorName' => $toName, 'contractUrl' => $contractUrl]);
        $subject = "契約商品のご確認";

        if(isset($toEmail) && $toEmail != ""){
            $this->emailSending($toEmail, $subject, $body);
        }
        return true;
    }

    public function emailToEmployee($employeeId, $contractorId, $contractId){
        $contractorDetails = (new ContractorModel())->getContractorDetailsById($contractorId);
        $employee = (new EmployeeModel())->getEmployeeById($employeeId)[0];
        $toEmail = $employee->getMailAddress();

        $contractorName = $contractorDetails[0]->contractor_name;
        $contractUrl = BASE_URL."/contract-details/".$contractId;
        $body = view("Emails/ContractUpdateMailToEmployee", ['contractorName' => $contractorName, 'contractUrl' => $contractUrl, 'contractId' => $contractId]);
        $subject = "契約更新確認依頼";

        if(isset($toEmail) && $toEmail != ""){
            $this->emailSending($toEmail, $subject, $body);
        }
        return true;
    }
}