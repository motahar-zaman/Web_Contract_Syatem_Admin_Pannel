<?php

namespace App\Controllers\Contractor;

use App\Controllers\BaseController;

class RegistrationController extends BaseController
{
    public function index(){
        if( session() && session()->get('login') ){
            return view("template/pages/forms/temp_contractor", ["title" => "Temporary Contractor Registration"]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function tempRegistration(){
        if( session() && session()->get('login') ){
            return view("template/pages/forms/contractor", ["title" => "Contractor Registration"]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function tempRegistrationAction(){
        if( session() && session()->get('login') ){
        }
        else{
            return redirect()->to("/login");
        }
    }
}