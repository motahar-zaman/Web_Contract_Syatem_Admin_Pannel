<?php


namespace App\Controllers\Contractor;


use App\Controllers\BaseController;

class ContractorController extends BaseController
{
    public function contractorSearch(){
        if( session() && session()->get('login') ){
            return "Hello, This feature is under Developing";
        }
        else{
            return redirect()->to("/login");
        }
    }
}