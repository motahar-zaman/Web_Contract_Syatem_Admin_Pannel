<?php

namespace App\Controllers\Authentication;

use App\Controllers\BaseController;
use App\Models\Authentication\AuthModel;
use CodeIgniter\HTTP\Request;
use Config\Services;

class AuthController extends BaseController{
    public function index()    {
        return view("Authentication/loginForm");
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
                    'employeeId' => $userInfo->employee_id,
                    'employeeName' => $userInfo->employee_name,
                    'employeeNameKana' => $userInfo->employee_name_kana,
                    'updateUserId' => $userInfo->update_user_id,
                    'insertUserId' => $userInfo->insert_user_id
                );

                session()->set($session_data);

                return redirect()->to("/home");
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
                    'contractorId' => $userInfo->contractor_id,
                    'contractorName' => $userInfo->contractor_name,
                    'contractorNameKana' => $userInfo->contractor_name_kana,
                    'zipcode' => $userInfo->zipcode,
                    'address_01' => $userInfo->address_01,
                    'address_02' => $userInfo->address_02,
                    'telNo' => $userInfo->tel_no,
                    'faxNo' => $userInfo->fax_no,
                    'mailAddress' => $userInfo->mail_address,
                    'typeContractor' => $userInfo->type_contractor,
                    'updateUserId' => $userInfo->update_user_id,
                    'insertUserId' => $userInfo->insert_user_id
                );

                session()->set($session_data);

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

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }

    public function home(){
        return view('home');
    }
}
