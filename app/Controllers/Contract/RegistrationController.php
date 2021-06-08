<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Address\AddressModel;
use App\Models\Common\SequenceModel;
use App\Models\Contract\Contract;
use App\Models\Contract\ContractModel;
use App\Models\Contractor\ContractorModel;
use App\Models\Employee\EmployeeModel;
use App\Models\Product\ProductModel;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopInfo;
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
            $employee = (new EmployeeModel())->getAllEmployee();

            $data = array(
                "title" => "Contract Registration",
                "shop" => $shop,
                "product" => $product,
                "contractor" => $contractor,
                "areas" => $area,
                "districts" => $district,
                "prefectures" => $prefecture,
                "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall,
                "employees" => $employee,
                "type" => "insert"
            );
            return view("Contract/contract", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function productDataTableData() {
        $products = (new ProductModel())->getDataTableData();
        echo json_encode($products);
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
            $employee = (new EmployeeModel())->getAllEmployee();

            $data = array(
                "title" => "Temporary Contract Registration",
                "shop" => $shop,
                "product" => $product,
                "contractor" => $contractor,
                "areas" => $area,
                "districts" => $district,
                "prefectures" => $prefecture,
                "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall,
                "employees" => $employee,
                "type" => "insert"
            );

            return view("Contract/contract", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function registrationAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                $contract = new Contract();

                $contract->setContractorId($_POST['contractorId'] ?? null);
                $contract->setTantouId($_POST['tantou'] ?? null);
                $contract->setNote($_POST['note'] ?? null);
                $contract->setUpdateDate(date("Y-m-d H:i:s"));
                $contract->setUpdateUserId(session()->get('userId'));
                $contract->setInsertDate(date("Y-m-d H:i:s"));
                $contract->setInsertUserId(session()->get('userId'));
                $contract->setDeleteFlag(1);

                if($_POST['contractType'] == 'update'){
                    $contract->setId($_POST['contractId']);
                    $contract->setStatus(07);
                    (new contractmodel())->updateContractData($contract);
                }
                else{
                    $contract->setId((new SequenceModel())->getContractSequence());
                    $contract->setStatus(02);
                    (new contractmodel())->storeContractData($contract);
                }


                $products = $_POST['productSelectId'];
                $contractProduct = array();
                $contractProduct['id'] = $contract->getId();
                $contractProduct['contractStatus'] = 0;
                $contractProduct['tantou'] = $_POST['tantou'] ?? null;
                $contractProduct['update'] = date("Y-m-d H:i:s");
                $contractProduct['updateUser'] = session()->get('userId');
                $contractProduct['insert'] = date("Y-m-d H:i:s");
                $contractProduct['insertUser'] = session()->get('userId');
                $contractProduct['delete'] = 1;

                (new ContractModel())->removeContractProductData($contract->getId());

                for ($i = 0; $i < count($products); $i++){
                    $product = $products[$i];
                    $start = explode("/",$product[2]);
                    $end = explode("/",$product[3]);

                    $contractProduct['product'] = $product[0];
                    $contractProduct['note'] = $product[1];
                    $contractProduct['shop'] = $product[4];
                    $contractProduct['startYear'] = $start[0];
                    $contractProduct['startMonth'] = $start[1];
                    $contractProduct['endYear'] = $end[0];
                    $contractProduct['endMonth'] = $end[1];
                    $contractProduct['branch'] = strtotime(date("Y-m-d H:i:s")) + $i;

                    (new ContractModel())->storeContractProductData($contractProduct);
                }
                return json_encode(['msg' => "Successful", "contract" => $contract->getId(), "status" => 1]);
            }
            else{
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }

    public function update($contractId){
        if( session() && session()->get('login') ){
            $shop = (new ShopModel())->getAllShopData();
            $product = (new ProductModel())->getAllProductData();
            $contractor = (new ContractorModel())->getAllContractorData();
            $area = (new AddressModel())->getAllArea();
            $district = (new AddressModel())->getAllDistrict();
            $prefecture = (new AddressModel())->getAllPrefecture();
            $areaLarge = (new AddressModel())->getAllAreaLarge();
            $areaSmall = (new AddressModel())->getAllAreaSmall();
            $employee = (new EmployeeModel())->getAllEmployee();

            $contract = (new ContractModel())->getContractById($contractId);

            $data = array(
                "title" => "Contract Update",
                "shop" => $shop,
                "product" => $product,
                "contractor" => $contractor,
                "areas" => $area,
                "districts" => $district,
                "prefectures" => $prefecture,
                "areaLarges" => $areaLarge,
                "areaSmalls" => $areaSmall,
                "employees" => $employee,
                "contract" => $contract[$contractId] ?? null,
                "type" => "update"
            );
            return view("Contract/contract", $data);
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function updateAction(){
        if( session() && session()->get('login') ){
            if($this->request->isAJAX()){
                $contract = new Contract();

                $contract->setId($_POST['contractId']);
                $contract->setContractorId($_POST['contractorId'] ?? null);
                $contract->setTantouId("abcd");
                $contract->setNote($_POST['note'] ?? null);
                $contract->setUpdateDate(date("Y-m-d H:i:s"));
                $contract->setUpdateUserId(session()->get('userId'));

                if($_POST['shop']){
                    $shop = new Shop();
                    $shop->setId((new SequenceModel())->getShopSequence());
                    $shop->setName($_POST['shopName'] ?? null);
                    $shop->setNameKana($_POST['shopNameKana'] ?? null);
                    //$shop->setRepresentative($_POST['shopRepresentative'] ?? null);
                    //$shop->setRepresentativeKana($_POST['shopRepresentativeKana'] ?? null);
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
                    $contract->setShopId($_POST['shopId'] ?? null);
                }

                (new contractmodel())->updateContractData($contract);

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
                    $productStore = (new ContractModel())->getContractProductById($contract->getId(), $product[0]);

                    if(isset($productStore) && count($productStore) > 0) {
                        continue;
                    }
                    else{
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

    public function processShopFile($file, $shopId, $path){
        $fileName = date("Ymd")."_".$shopId.".pdf";//$file->getClientExtension();
        $targetFile = $path."/".$fileName;

        /*if(file_exists($path)){
            mkdir($path, 0777, true);
        }
        move_uploaded_file($file, $targetFile);*/

        return $fileName;
    }

    public function shopRegistration(){
        if( session() && session()->get('login') ) {
            if ($this->request->isAJAX()) {
                $shop = new Shop();
                $shopInfo = new ShopInfo();

                $notificationLetter = $_POST["notification_letter"];
                $path = "/shopFiles";

                $shop->setId((new SequenceModel())->getShopSequence());
                $shop->setName($_POST['shopName'] ?? null);
                $shop->setNameKana($_POST['shopNameKana'] ?? null);
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

                $shopInfo->setId($shop->getId());
                $shopInfo->setStatus(1);
                $shopInfo->setRepresentative($_POST['shopRepresentative'] ?? null);
                $shopInfo->setRepresentativeKana($_POST['shopRepresentativeKana'] ?? null);
                $shopInfo->setBusiness(1);
                $shopInfo->setNotification(isset($notificationLetter) ? $this->processShopFile($notificationLetter, $shop->getId(), $path) : null);
                $shopInfo->setPjId(null);
                $shopInfo->setPlId(null);
                $shopInfo->setTorihikisakiId(null);
                $shopInfo->setInsertDate(date("Y-m-d H:i:s"));
                $shopInfo->setInsertUserId(session()->get('userId'));
                $shopInfo->setUpdateDate(date("Y-m-d H:i:s"));
                $shopInfo->setUpdateUserId(session()->get('userId'));
                $shopInfo->setDeleteFlag(1);

                (new ShopModel())->storeShopData($shop);
                (new ShopModel())->storeShopInfoData($shopInfo);

                return json_encode(['msg' => "successful", 'shopId' => $shop->getId(), 'shopName' => $shop->getName(), 'shopFile' => $shopInfo->getNotification(), 'status' => 1]);
            }
            else {
                return json_encode(['msg' => "Not an ajax request", 'status' => 2]);
            }
        }
        else{
            return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
        }
    }
}
