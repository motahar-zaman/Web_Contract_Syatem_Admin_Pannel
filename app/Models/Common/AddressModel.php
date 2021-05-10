<?php


namespace App\Models\Common;


use App\Models\Address\Prefecture;
use App\Models\Database;

class AddressModel
{
    public function getAllPrefecture(){
        $data = $this->getAllPrefectureData();
        return $this->mapPrefectureData($data);
    }

    public function getAllPrefectureData(){
        $queryString = "SELECT prefecture_id, district_id, area_name, area_areas, sort_order, update_date, update_user_id, insert_date, insert_user_id,
            delete_flag FROM mst_area_prefecture WHERE delete_flag = ?";

        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapPrefectureData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                if(isset($data)){
                    $prefecture = new Prefecture();

                    $prefecture->setId($data->prefecture_id ?? NULL);
                    $prefecture->setDistrict($data->district_id ?? NULL);
                    $prefecture->setName($data->area_name ?? NULL);
                    $prefecture->setAreas($data->area_areas ?? NULL);
                    $prefecture->setOrder($data->sort_order ?? NULL);
                    $prefecture->setUpdateDate($data->update_date ?? NULL);
                    $prefecture->setUpdateUser($data->update_user_id ?? NULL);
                    $prefecture->setInsertDate($data->insert_date ?? NULL);
                    $prefecture->setInsertUser($data->insert_user_id ?? NULL);
                    $prefecture->setDeleteFlag($data->delete_flag ?? NULL);

                    array_push($mappedData, $prefecture);
                }
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }
}