<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
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
                $contract = new Contract();

                if($_POST['shop']){
                    $shop = new Shop();
                    $shop->setId($_POST['shopId']);
                    $shop->setName($_POST['shopName']);
                    $shop->setNameKana($_POST['shopNameKana']);
                    $shop->setRepresentative($_POST['shopRepresentative']);
                    $shop->setRepresentativeKana($_POST['shopRepresentativeKana']);
                    $shop->setZipcode($_POST['shopZip']);
                    $shop->setAddress01($_POST['shopAddress01']);
                    $shop->setAddress02($_POST['shopAddress02']);
                    $shop->setAreaId($_POST['shopArea']);
                    $shop->setPrefecture($_POST['shopPrefecture']);
                    $shop->setTelNo($_POST['shopTel']);
                    $shop->setMailAddress($_POST['shopMail']);
                    $shop->setSiteUrl($_POST['shopSite']);
                    $shop->setInsertDate(date("Y-m-d H:i:s"));
                    $shop->setInsertUserId(session()->get('userId'));
                    $shop->setUpdateDate(date("Y-m-d H:i:s"));
                    $shop->setUpdateUserId(session()->get('userId'));
                    $shop->setDeleteFlag(1);

                    (new ShopModel())->storeShopData($shop);
                }

                $contract->setId((new SequenceModel())->getContractSequence());
                $contract->setShopId($_POST['shopId']);
                $contract->setContractorId($_POST['contractorName']);
                $contract->setTantouId("abcd");
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