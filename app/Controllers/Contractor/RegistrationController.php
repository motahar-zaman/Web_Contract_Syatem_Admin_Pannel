<?php

namespace App\Controllers\Contractor;

use App\Controllers\BaseController;

class RegistrationController extends BaseController
{
    public function index(){
        return view("template/pages/forms/contractor", ["title" => "Contractor Registration"]);
    }

    public function registrationAction(){
    }

}