<?php

namespace App\Controllers\Authentication;

use App\Controllers\BaseController;
use App\Models\Authentication\AuthModel;
use Firebase\JWT\JWT;

class AuthController extends BaseController{

    public function index(){
        if( session() && session()->get('login') ){
            return view("home", ["title" => "Home"]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function login(){
        if( session() && session()->get('login') ){
            return redirect()->back();
        }
        else{
            return view("login", ["title" => "Login"]);
        }
    }

    public function loginAction(){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $user = explode("_",$name);
        $auth = new AuthModel();

        if ($user[0] == k1_employee_user_prefix){
            $userInfo = $auth->loginEmployee($name, $password);
            if (isset($userInfo) && count($userInfo) > 0){
                $userInfo = $userInfo[0];

                $session_data = array(
                    'login' => true,
                    'user' => "employee",
                    'userId' => $userInfo->employee_id,
                    'userName' => $userInfo->employee_name,
                    'employeeNameKana' => $userInfo->employee_name_kana,
                    'department' => $userInfo->department,
                    'updateUserId' => $userInfo->update_user_id,
                    'insertUserId' => $userInfo->insert_user_id,
                    'time' => date("Y-m-d H:i:s"),
                    'exp' => time()+60
                );

                session()->set($session_data);
                $token = JWT::encode($session_data, jwt_token_key, jwt_token_algorithm);

                return redirect()->to(session()->get("redirect") ?? "/");
            }
            else{
                return redirect()->to('/login');
            }
        }
        elseif ($user[0] == contractor_user_prefix){
            $userInfo = $auth->loginContractor($name, $password);
            if(isset($userInfo) && count($userInfo) > 0){
                $userInfo = $userInfo[0];

                $session_data = array(
                    'login' => true,
                    'user' => "contractor",
                    'userId' => $userInfo->contractor_id,
                    'userName' => $userInfo->contractor_name,
                    'contractorNameKana' => $userInfo->contractor_name_kana,
                    'zipcode' => $userInfo->zipcode,
                    'address_01' => $userInfo->address_01,
                    'address_02' => $userInfo->address_02,
                    'telNo' => $userInfo->tel_no,
                    'faxNo' => $userInfo->fax_no,
                    'mailAddress' => $userInfo->mail_address,
                    'typeContractor' => $userInfo->type_contractor,
                    'updateUserId' => $userInfo->update_user_id,
                    'insertUserId' => $userInfo->insert_user_id,
                    'time' => date("Y-m-d H:i:s"),
                    'exp' => time()+60
                );

                session()->set($session_data);
                $token = JWT::encode($session_data, jwt_token_key, jwt_token_algorithm);

                return redirect()->to(session()->get("redirect") ?? "/");
            }
            else{
                return redirect()->to('/login');
            }
        }
        else{
            return redirect()->to('/login');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }

    public function home(){
        $data = getallheaders();
        $token = $data["token"];
        return json_encode(JWT::decode($token, jwt_token_key, array(jwt_token_algorithm)));
    }
}
