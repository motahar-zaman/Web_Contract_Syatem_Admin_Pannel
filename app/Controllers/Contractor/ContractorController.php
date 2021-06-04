<?php


namespace App\Controllers\Contractor;


use App\Controllers\BaseController;
use App\Models\Contractor\ContractorModel;

class ContractorController extends BaseController
{
    public function contractorSearch(){
        if( session() && session()->get('login') ){
            if($_SERVER['QUERY_STRING']){
                $contractorId = $_GET['contractorIdSearch'];
                $contractorName = $_GET['contractorNameSearch'];
                $companyId = $_GET['companyIdSearch'];
                $companyName = $_GET['companyNameSearch'];
                $groupId = $_GET['groupIdSearch'];
                $groupName = $_GET['groupNameSearch'];

                $userType = 0;
                if(session()->get("user") == "contractor"){
                    $userType = 1;
                }

                if($contractorId){
                    $contractor = (new ContractorModel())->getContractorDetailsById($contractorId, $userType, session()->get("userId"));
                    if(isset($contractor) && count($contractor) > 0 ){
                        return redirect()->to("contractor-details/".$contractorId);
                    }
                    else{
                        return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
                    }
                }
                elseif($contractorName != "" || $companyId != "" || $companyName != "" || $groupId != "" || $groupName != ""){
                    $contractor = (new ContractorModel())->getContractorByName($contractorName, $companyId, $companyName, $groupId, $groupName, $userType, session()->get("userId"));

                    return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
                }
                else{
                    return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => array()]);
                }
            }
            else{
                if(session()->get("user") == "contractor"){
                    $contractor = (new ContractorModel())->getAllContractorData(1, session()->get("userId"));
                }
                else{
                    $contractor = (new ContractorModel())->getAllContractorData(0, session()->get("userId"));
                }

                return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
            }
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function contractorDetails($contractorId){
        if( session() && session()->get('login') ){
            $contractorDetails = (new ContractorModel())->getContractorDetailsById($contractorId);
            return view("Contractor/contractorDetails", ["title" => "Contractor Details", "contractorDetails" => $contractorDetails[0]]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}