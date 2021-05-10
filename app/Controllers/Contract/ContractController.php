<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Contract\ContractModel;

class ContractController extends BaseController
{
    public function contractSearch(){
        if( session() && session()->get('login') ){
            if($_SERVER['QUERY_STRING']){
                $searchId = $_GET['searchById'];
                $searchName = $_GET['searchByName'];
                if($searchId){
                    $contract = null;//(new ContractModel())->getContractDetailsById($searchId);
                    return "This Section is under Development";
                    //return view("contract/contractDetail", ["title" => "Contract Details", "contract" => $contract]);
                }
                else{
                    $contract = null;//(new ContractModel())->getContractByName($searchName);
                    return view("contract/contractSearch", ["title" => "Contract Search", "contract" => $contract]);
                }
            }
            else{
                $contract = null;//(new ContractModel())->getAllContractData();
                return view("contract/contractSearch", ["title" => "Contract Search", "contract" => $contract]);
            }
        }
        else{
            return redirect()->to("/login");
        }
    }
}