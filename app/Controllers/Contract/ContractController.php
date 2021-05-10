<?php


namespace App\Controllers\Contract;


use App\Models\Contract\ContractModel;

class ContractController
{
    public function contractSearch(){
        if( session() && session()->get('login') ){
            if($_SERVER['QUERY_STRING']){
                $searchId = $_GET['searchById'];
                $searchName = $_GET['searchByName'];
                if($searchId){
                    $contract = (new ContractModel())->getContractDetailsById($searchId);
                    return "This Section is under Development";
                    //return view("contract/contractDetail", ["title" => "Contract Details", "contract" => $contract]);
                }
                else{
                    $contract = (new ContractModel())->getContractByName($searchName);
                    return view("contract/contractSearch", ["title" => "Contract Search", "contract" => $contract]);
                }
            }
            else{
                $contract = (new ContractModel())->getAllContractData();
                return view("contract/contractSearch", ["title" => "Contract Search", "contract" => $contract]);
            }
        }
        else{
            return redirect()->to("/login");
        }
    }
}