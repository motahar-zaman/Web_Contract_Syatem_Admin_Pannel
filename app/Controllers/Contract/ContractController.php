<?php


namespace App\Controllers\Contract;


class ContractController
{
    public function contractorSearch(){
        if( session() && session()->get('login') ){
            echo "Hello, This section is under developing";
        }
        else{
            return redirect()->to("/login");
        }
    }
}