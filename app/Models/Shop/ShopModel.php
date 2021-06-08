<?php


namespace App\Models\Shop;


use App\Models\Database;

class ShopModel
{
    public function storeShopData(Shop $shop){
        $id = $shop->getId();
        $name = $shop->getName();
        $nameKana = $shop->getNameKana();
        $zip = $shop->getZipcode();
        $address1 = $shop->getAddress01();
        $address2 = $shop->getAddress02();
        $area = $shop->getAreaId();
        $prefecture = $shop->getPrefecture();
        $district = $shop->getDistrict();
        $areaLarge = $shop->getAreaLarge();
        $areaSmall = $shop->getAreaSmall();
        $phn = $shop->getTelNo();
        $fax = $shop->getFaxNo();
        $mail = $shop->getMailAddress();
        $siteUrl = $shop->getSiteUrl();
        $update = $shop->getUpdateDate();
        $updateUser = $shop->getUpdateUserId();
        $insert = $shop->getInsertDate();
        $insertUser = $shop->getInsertUserId();
        $delete = $shop->getDeleteFlag();

        $queryString = "INSERT INTO mst_shop (shop_id, shop_name, shop_name_kana, zipcode, address_01, address_02, area_id, prefecture,
                        district_id, large_area_id, small_area_id, tel_no, fax_no, mail_address, site_url, update_date, update_user_id,
                        insert_date, insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $name, $nameKana, $zip, $address1, $address2, $area, $prefecture, $district, $areaLarge, $areaSmall,
            $phn, $fax, $mail, $siteUrl, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllShopData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT shop_id, shop_name, shop_name_kana, zipcode, address_01, address_02, area_id, prefecture, district_id,
                        large_area_id, small_area_id, tel_no, fax_no, mail_address, site_url, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag FROM mst_shop WHERE delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                $shop = new Shop();
                if(isset($data)){
                    $shop->setId($data->shop_id ?? NULL);
                    $shop->setName($data->shop_name ?? NULL);
                    $shop->setNameKana($data->shop_name_kana ?? NULL);
                    $shop->setZipCode($data->zipcode ?? NULL);
                    $shop->setAddress01($data->address_01 ?? NULL);
                    $shop->setAddress02($data->address_02 ?? NULL);
                    $shop->setAreaId($data->area_id ?? NULL);
                    $shop->setPrefecture($data->prefecture ?? NULL);
                    $shop->setDistrict($data->district_id ?? NULL);
                    $shop->setAreaLarge($data->large_area_id ?? NULL);
                    $shop->setAreaSmall($data->small_area_id ?? NULL);
                    $shop->setTelNo($data->tel_no ?? NULL);
                    $shop->setFaxNo($data->fax_no ?? NULL);
                    $shop->setMailAddress($data->mail_address ?? NULL);
                    $shop->setSiteUrl($data->site_url ?? NULL);
                    $shop->setUpdateDate($data->update_date ?? NULL);
                    $shop->setUpdateUserId($data->update_user_id ?? NULL);
                    $shop->setInsertDate($data->insert_date ?? NULL);
                    $shop->setInsertUserId($data->insert_user_id ?? NULL);
                    $shop->setDeleteFlag($data->delete_flag ?? NULL);
                }
                array_push($mappedData, $shop);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function storeShopInfoData(ShopInfo $shopInfo){
        $id = $shopInfo->getId();
        $status = $shopInfo->getStatus();
        $rep = $shopInfo->getRepresentative();
        $repKana = $shopInfo->getRepresentativeKana();
        $business = $shopInfo->getBusiness();
        $notification = $shopInfo->getNotification();
        $pl = $shopInfo->getPlId();
        $pj = $shopInfo->getPjId();
        $torihikisaki = $shopInfo->getTorihikisakiId();
        $update = $shopInfo->getUpdateDate();
        $updateUser = $shopInfo->getUpdateUserId();
        $insert = $shopInfo->getInsertDate();
        $insertUser = $shopInfo->getInsertUserId();
        $delete = $shopInfo->getDeleteFlag();

        $queryString = "INSERT INTO trn_shop_info (shop_id, shop_status, shop_daihyo_name, shop_daihyo_name_kana, business, notificate_file_path,
                        pl_id, pj_id, torihikisaki_id, update_date, update_user_id, insert_date, insert_user_id, delete_flag)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $status, $rep, $repKana, $business, $notification, $pl, $pj, $torihikisaki, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getDataTableData() {
        $params['draw'] = $_REQUEST['draw'];
        $condition = "";
        $queryParameter = [1];

        if (isset($_POST['shopId']) && $_POST['shopId'] !== '') {
            $condition .= " AND shop_id LIKE ?";
            $queryParameter[] = $_POST['shopId'];
        }

        if (isset($_POST['shopName']) && $_POST['shopName'] !== '') {
            $condition .= " AND shop_name LIKE ?";
            $queryParameter[] = "%" . $_POST['shopName'] . "%";
        }

        $queryString = "SELECT shop_id, shop_name, shop_name_kana, zipcode, address_01, address_02, area_id, prefecture, district_id,
                        large_area_id, small_area_id, tel_no, fax_no, mail_address, site_url, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag FROM mst_shop WHERE delete_flag = ? {$condition} ORDER BY update_date DESC";

        $data = (new Database())->readQueryExecution($queryString, $queryParameter);
        $jsonData = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => $data ? count($data) : 0,
            "recordsFiltered" => $data ? count($data) : 0,
            "data" => $data
        );

        return $jsonData;
    }
}
