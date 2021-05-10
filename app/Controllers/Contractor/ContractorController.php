<?php


namespace App\Controllers\Contractor;


use App\Controllers\BaseController;
use App\Models\Contractor\ContractorModel;

class ContractorController extends BaseController
{
    public function contractorSearch(){
        if( session() && session()->get('login') ){
            if($_SERVER['QUERY_STRING']){
                $searchId = $_GET['searchById'];
                $searchName = $_GET['searchByName'];
                if($searchId){
                    $contractor = (new ContractorModel())->getContractorDetailsById($searchId);
                    return "This Section is under Development";
                    //return view("contractor/contractorDetail", ["title" => "Contractor Detail", "contractor" => $contractor]);
                }
                else{
                    $contractor = (new ContractorModel())->getContractorByName($searchName);
                    return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
                }
            }
            else{
                $contractor = (new ContractorModel())->getAllContractorData();
                return view("Contractor/contractorSearch", ["title" => "Contractor Search", "contractor" => $contractor]);
            }
        }
        else{
            return redirect()->to("/login");
        }
    }
}