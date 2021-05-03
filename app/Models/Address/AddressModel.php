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

    public function getAllDistrict(){
        $data = $this->getAllDistrictData();
        return $this->mapDistrictData($data);
    }

    public function getAllDistrictData(){
        $queryString = "SELECT area_id, area_name, area_areas, sort_order, update_date, update_user_id, insert_date, insert_user_id, delete_flag
                        FROM mst_area_district WHERE delete_flag = ?";
        $parameter = array(1);

        return (new Database())->readQueryExecution($queryString, $parameter);
    }

    public function mapDistrictData($datas = array()){
        if(isset($datas) && is_array($datas)) {
            $length = count($datas);
            $mappedData = array();

            for ($i = 0; $i < $length; $i++) {
                $data = $datas[$i];
                $district = new District();
                if (isset($data)) {
                    $district->setAreaId($data->area_id ?? null);
                    $district->setAreaName($data->area_name ?? null);
                    $district->setAreaAreas($data->area_areas ?? null);
                    $district->setOrder($data->sort_order ?? null);
                    $district->setUpdateDate($data->update_date ?? null);
                    $district->setUpdateUser($data->update_user_id ?? null);
                    $district->setInsertDate($data->insert_date ?? null);
                    $district->setInsertUser($data->insert_user_id ?? null);
                    $district->setDeleteFlag($data->delete_flag ?? null);
                }
                array_push($mappedData, $district);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }
}