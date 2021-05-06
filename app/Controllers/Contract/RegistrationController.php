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
            $areaLarge = (new AddressModel())->getAllAreaLarge();
            $areaSmall = (new AddressModel())->getAllAreaSmall();

            return view("Contract/contract", ["title" => "Contract Registration", "shop" => $shop, "product" => $product, "contractor" =>
                $contractor, "areas" => $area, "districts" => $district, "prefectures" => $prefecture, "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall]);
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
            $areaLarge = (new AddressModel())->getAllAreaLarge();
            $areaSmall = (new AddressModel())->getAllAreaSmall();

            return view("Contract/temp_contract", ["title" => "Temporary Contract Registration", "shop" => $shop, "product" => $product,
                "contractor" => $contractor, "areas" => $area, "districts" => $district, "prefectures" => $prefecture, "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall]);
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
                    $shop->setId((new SequenceModel())->getShopSequence());
                    $shop->setName($_POST['shopName'] ?? null);
                    $shop->setNameKana($_POST['shopNameKana'] ?? null);
                    $shop->setRepresentative($_POST['shopRepresentative'] ?? null);
                    $shop->setRepresentativeKana($_POST['shopRepresentativeKana'] ?? null);
                    $shop->setZipcode($_POST['shopZip'] ?? null);
                    $shop->setAddress01($_POST['shopAddress01'] ?? null);
                    $shop->setAddress02($_POST['shopAddress02'] ?? null);
                    $shop->setAreaId($_POST['shopArea'] ?? null);
                    $shop->setPrefecture($_POST['shopPrefecture'] ?? null);
                    $shop->setDistrict($_POST['shopDistrict'] ?? null);
                    $shop->setAreaLarge($_POST['shopAreaLarge'] ?? null);
                    $shop->setAreaSmall($_POST['shopAreaSmall'] ?? null);
                    $shop->setTelNo($_POST['shopTel'] ?? null);
                    $shop->setMailAddress($_POST['shopMail'] ?? null);
                    $shop->setSiteUrl($_POST['shopSite'] ?? null);
                    $shop->setInsertDate(date("Y-m-d H:i:s"));
                    $shop->setInsertUserId(session()->get('userId'));
                    $shop->setUpdateDate(date("Y-m-d H:i:s"));
                    $shop->setUpdateUserId(session()->get('userId'));
                    $shop->setDeleteFlag(1);

                    (new ShopModel())->storeShopData($shop);
                    $contract->setShopId($shop->getId());
                }
                else{
                    $contract->setShopId($_POST['shopId']);
                }

                $contract->setId((new SequenceModel())->getContractSequence());
                $contract->setContractorId($_POST['contractorId'] ?? null);
                $contract->setTantouId("abcd");
                $contract->setNote($_POST['note'] ?? null);
                $contract->setUpdateDate(date("Y-m-d H:i:s"));
                $contract->setUpdateUserId(session()->get('userId'));
                $contract->setInsertDate(date("Y-m-d H:i:s"));
                $contract->setInsertUserId(session()->get('userId'));
                $contract->setDeleteFlag(1);

                (new contractmodel())->storeContractData($contract);

                $products = $_POST['productSelectId'];
                $contractProduct = array();
                $contractProduct['id'] = $contract->getId();
                $contractProduct['contractStatus'] = 0;
                $contractProduct['tantou'] = "abcd";
                $contractProduct['update'] = date("Y-m-d H:i:s");
                $contractProduct['updateUser'] = session()->get('userId');
                $contractProduct['insert'] = date("Y-m-d H:i:s");
                $contractProduct['insertUser'] = session()->get('userId');
                $contractProduct['delete'] = 1;

                for ($i = 0; $i < count($products); $i++){
                    $product = $products[$i];
                    $start = explode("-",$product[2]);
                    $end = explode("-",$product[3]);

                    $contractProduct['product'] = $product[0];
                    $contractProduct['note'] = $product[1];
                    $contractProduct['startYear'] = $start[0];
                    $contractProduct['startMonth'] = $start[1];
                    $contractProduct['endYear'] = $end[0];
                    $contractProduct['endMonth'] = $end[1];
                    $contractProduct['branch'] = strtotime(date("Y-m-d H:i:s")) + $i;

                    (new ContractModel())->storeContractProductData($contractProduct);
                }

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
            $shop = (new ShopModel())->getAllShopData();
            $product = (new ProductModel())->getAllProductData();
            $contractor = (new ContractorModel())->getAllContractorData();
            $area = (new AddressModel())->getAllArea();
            $district = (new AddressModel())->getAllDistrict();
            $prefecture = (new AddressModel())->getAllPrefecture();
            $areaLarge = (new AddressModel())->getAllAreaLarge();
            $areaSmall = (new AddressModel())->getAllAreaSmall();
            $contract = (new ContractModel())->getAllContract();

            return view("Contract/update", ["title" => "Contract Update", "shop" => $shop, "product" => $product, "contractor" =>
                $contractor, "areas" => $area, "districts" => $district, "prefectures" => $prefecture, "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall, "contracts" => $contract]);
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