<?php


namespace App\Models\Shop;


use App\Models\Database;

class ShopModel
{
    public function getAllShopData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT shop_id, shop_name, shop_name_kana, daihyousha_name, daihyousha_name_kana, zipcode, address_01, address_02, area_id,
                        prefecture, tel_no, fax_no, mail_address, site_url, update_date, update_user_id, insert_date, insert_user_id, delete_flag
                        FROM mst_shop WHERE delete_flag = ? ORDER BY update_date DESC";
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
                    $shop->setRepresentative($data->daihyousha_name ?? NULL);
                    $shop->setRepresentativeKana($data->daihyousha_name_kana ?? NULL);
                    $shop->setZipCode($data->zipcode ?? NULL);
                    $shop->setAddress01($data->address_01 ?? NULL);
                    $shop->setAddress02($data->address_02 ?? NULL);
                    $shop->setAreaId($data->area_id ?? NULL);
                    $shop->setPrefecture($data->prefecture ?? NULL);
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
}