<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Contractor\ContractorModel;
use App\Models\Product\ProductModel;
use App\Models\Shop\ShopModel;

class RegistrationController extends BaseController
{
    public function index(){
        if( session() && session()->get('login') ){
            $shop = (new ShopModel())->getAllShopData();
            $product = (new ProductModel())->getAllProductData();
            $contractor = (new ContractorModel())->getAllContractorData();
//            dd($product);

            return view("Contract/contract", ["title" => "Contract Registration", "shop" => $shop, "product" => $product, "contractor" => $contractor]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function tempRegistration(){
        if( session() && session()->get('login') ){
            $shop = (new ShopModel())->getAllShopData();
            $product = (new ProductModel())->getAllProductData();
            $contractor = (new ContractorModel())->getAllContractorData();

            return view("Contract/temp_contract", ["title" => "Contract Registration", "shop" => $shop, "product" => $product, "contractor" => $contractor]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                return json_encode(['msg' => "Successful", 'status' => 1]);
            }
            else{
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }

    public function update(){
        if( session() && session()->get('login') ){
            echo "Hello, This section is under developing";
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function updateAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                return json_encode(['msg' => "Successful", 'status' => 1]);
            }
            else{
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }
}