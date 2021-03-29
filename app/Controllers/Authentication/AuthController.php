<?php

namespace App\Controllers\Authentication;

use App\Controllers\BaseController;
use App\Models\Authentication\AuthModel;
use CodeIgniter\HTTP\Request;

class AuthController extends BaseController{
    public function index()    {
        return view("Authentication/loginForm");
    }

    public function loginAction(){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $user = explode("_",$name);
        $auth = new AuthModel();

        if($user[0] == k1_employee_user_prefix){
            $userInfo = $auth->loginEmployee($name, $password);
            if($userInfo){
                return redirect()->to("/home");
            }
            else{
                return redirect()->to('/login');
            }

        }
        if($user[0] == contractor_user_prefix){
            $userInfo = $auth->loginContractor($name, $password);
            if($userInfo){
                return redirect()->to("/home");
            }
            else{
                return redirect()->to('/login');
            }
        }
        else{
            return redirect()->to('/login');
        }
    }

    public function home(){
        return view('home');
    }
}
