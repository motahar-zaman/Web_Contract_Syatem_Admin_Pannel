<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Address\AddressModel;
use App\Models\Common\SequenceModel;
use App\Models\Contract\Contract;
use App\Models\Contract\ContractModel;
use App\Models\Contractor\ContractorModel;
use App\Models\Product\ProductModel;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopModel;

class RegistrationController extends BaseController
{
    public function index(){
        if( session() && session()->get('login') ){
            $shop = (new ShopModel())->getAllShopData();
            $product = (new ProductModel())->getAllProductData();
            $contractor = (new ContractorModel())->getAllContractorData();
            $area = (new AddressModel())->getAllArea();
            $district = (new AddressModel())->getAllDistrict();
            $prefecture = (new AddressModel())->getAllPrefecture();

            return view("Contract/contract", ["title" => "Contract Registration", "shop" => $shop, "product" => $product,
                "contractor" => $contractor, "area" => $area, "district" => $district, "prefecture" => $prefecture]);
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
            $area = (new AddressModel())->getAllArea();
            $district = (new AddressModel())->getAllDistrict();
            $prefecture = (new AddressModel())->getAllPrefecture();

            return view("Contract/temp_contract", ["title" => "Contract Registration", "shop" => $shop, "product" => $product,
                "contractor" => $contractor, "area" => $area, "district" => $district, "prefecture" => $prefecture]);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                $contract = new Contract();
                $shop = new Shop();

                $contract->setId((new SequenceModel())->getContractSequence());
                $contract->setShopId($_POST['shopId']);
                $contract->setContractorId($_POST['contractorName']);
                $contract->setTantouId($_POST['tantouId']);
                $contract->setNote($_POST['note']);
                $contract->setUpdateDate(date("Y-m-d H:i:s"));
                $contract->setUpdateUserId(session()->get('userId'));
                $contract->setInsertDate(date("Y-m-d H:i:s"));
                $contract->setInsertUserId(session()->get('userId'));
                $contract->setDeleteFlag(1);

                (new contractmodel())->storeContractData($contract);

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