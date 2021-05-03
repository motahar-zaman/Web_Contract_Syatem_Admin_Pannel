<?php


namespace App\Models\Address;


use App\Models\Database;

class AddressModel
{
    public function getAllArea(){
        $data = $this->getAllAreaData();
        return $this->mapAreaData($data);
    }

    public function getAllAreaData(){
        $queryString = "SELECT area_id, district_id, prefecture_id, large_area_id, small_area_id, area_name, area_areas, sort_order, update_date,
                        update_user_id, insert_date, insert_user_id, delete_flag FROM mst_area WHERE delete_flag = ?";
        $parameter = array(1);

        return (new Database())->readQueryExecution($queryString, $parameter);
    }

    public function mapAreaData($datas = array()){
        if(isset($datas) && is_array($datas)) {
            $length = count($datas);
            $mappedData = array();

            for ($i = 0; $i < $length; $i++) {
                $data = $datas[$i];
                $area = new Area();
                if (isset($data)) {
                    $area->setId($data->area_id ?? null);
                    $area->setDistrict($data->district_id ?? null);
                    $area->setPrefecture($data->prefecture_id ?? null);
                    $area->setLarge($data->large_area_id ?? null);
                    $area->setSmall($data->small_area_id ?? null);
                    $area->setName($data->area_name ?? null);
                    $area->setAreas($data->area_areas ?? null);
                    $area->setOrder($data->sort_order ?? null);
                    $area->setUpdateDate($data->update_date ?? null);
                    $area->setUpdateUser($data->update_user_id ?? null);
                    $area->setInsertDate($data->insert_date ?? null);
                    $area->setInsertUser($data->insert_user_id ?? null);
                    $area->setDeleteFlag($data->delete_flag ?? null);
                }
                array_push($mappedData, $area);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }
}