<?php


namespace App\Models\Address;


use App\Models\Database;

class AddressModel
{
    public function getArea(){
        $data = $this->getAreaData();
        return $this->mapAreaData($data);
    }

    public function getAreaData($district = null){
        $where = "WHERE ";
        if($district){
            $where .= "district_id = '$district' AND ";
        }

        $queryString = "SELECT area_id, district_id, prefecture_id, large_area_id, small_area_id, area_name, area_areas, sort_order, update_date,
                        update_user_id, insert_date, insert_user_id, delete_flag FROM mst_area ".$where." delete_flag = ?";
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

    public function getDistrict(){
        $data = $this->getDistrictData();
        return $this->mapDistrictData($data);
    }

    public function getDistrictData(){
        $queryString = "SELECT district_id, area_name, area_areas, sort_order, update_date, update_user_id, insert_date, insert_user_id, delete_flag
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
                    $district->setId($data->district_id ?? null);
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

    public function getPrefecture(){
        $data = $this->getPrefectureData();
        return $this->mapPrefectureData($data);
    }

    public function getPrefectureData($district = null){
        $where = "WHERE ";
        if($district){
            $where .= "district_id = '$district' AND ";
        }
        $queryString = "SELECT prefecture_id, district_id, area_name, area_areas, sort_order, update_date, update_user_id, insert_date, insert_user_id,
                        delete_flag FROM mst_area_prefecture ".$where." delete_flag = ?";

        $parameter = array(1);

        return (new Database())->readQueryExecution($queryString, $parameter);
    }

    public function mapPrefectureData($datas = array()){
        if(isset($datas) && is_array($datas)) {
            $length = count($datas);
            $mappedData = array();

            for ($i = 0; $i < $length; $i++) {
                $data = $datas[$i];
                $prefecture = new Prefecture();
                if (isset($data)) {
                    $prefecture->setId($data->prefecture_id ?? null);
                    $prefecture->setDistrict($data->district_id ?? null);
                    $prefecture->setName($data->area_name ?? null);
                    $prefecture->setAreas($data->area_areas ?? null);
                    $prefecture->setOrder($data->sort_order ?? null);
                    $prefecture->setUpdateDate($data->update_date ?? null);
                    $prefecture->setUpdateUser($data->update_user_id ?? null);
                    $prefecture->setInsertDate($data->insert_date ?? null);
                    $prefecture->setInsertUser($data->insert_user_id ?? null);
                    $prefecture->setDeleteFlag($data->delete_flag ?? null);
                }
                array_push($mappedData, $prefecture);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function getAreaLarge(){
        $data = $this->getAreaLargeData();
        return $this->mapAreaLargeData($data);
    }

    public function getAreaLargeData($district = null){
        $where = "WHERE ";
        if($district){
            $where .= "district_id = '$district' AND ";
        }

        $queryString = "SELECT large_area_id, district_id, prefecture_id, area_name, area_areas, sort_order, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag FROM mst_area_large ".$where." delete_flag = ?";
        $parameter = array(1);

        return (new Database())->readQueryExecution($queryString, $parameter);
    }

    public function mapAreaLargeData($datas = array()){
        if(isset($datas) && is_array($datas)) {
            $length = count($datas);
            $mappedData = array();

            for ($i = 0; $i < $length; $i++) {
                $data = $datas[$i];
                $areaLarge = new AreaLarge();
                if (isset($data)) {
                    $areaLarge->setId($data->large_area_id ?? null);
                    $areaLarge->setDistrict($data->district_id ?? null);
                    $areaLarge->setPrefecture($data->prefecture_id ?? null);
                    $areaLarge->setName($data->area_name ?? null);
                    $areaLarge->setAreas($data->area_areas ?? null);
                    $areaLarge->setOrder($data->sort_order ?? null);
                    $areaLarge->setUpdateDate($data->update_date ?? null);
                    $areaLarge->setUpdateUser($data->update_user_id ?? null);
                    $areaLarge->setInsertDate($data->insert_date ?? null);
                    $areaLarge->setInsertUser($data->insert_user_id ?? null);
                    $areaLarge->setDeleteFlag($data->delete_flag ?? null);
                }
                array_push($mappedData, $areaLarge);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function getAreaSmall(){
        $data = $this->getAreaSmallData();
        return $this->mapAreaSmallData($data);
    }

    public function getAreaSmallData($district = null){
        $where = "WHERE ";
        if($district){
            $where .= "district_id = '$district' AND ";
        }

        $queryString = "SELECT small_area_id, district_id, prefecture_id, area_large_id, area_name, area_areas, sort_order, update_date, update_user_id,
                         insert_date, insert_user_id, delete_flag FROM mst_area_small ".$where." delete_flag = ?";
        $parameter = array(1);

        return (new Database())->readQueryExecution($queryString, $parameter);
    }

    public function mapAreaSmallData($datas = array()){
        if(isset($datas) && is_array($datas)) {
            $length = count($datas);
            $mappedData = array();

            for ($i = 0; $i < $length; $i++) {
                $data = $datas[$i];
                $areaSmall = new AreaSmall();
                if (isset($data)) {
                    $areaSmall->setId($data->small_area_id ?? null);
                    $areaSmall->setDistrict($data->district_id ?? null);
                    $areaSmall->setPrefecture($data->prefecture_id ?? null);
                    $areaSmall->setLarge($data->area_large_id ?? null);
                    $areaSmall->setName($data->area_name ?? null);
                    $areaSmall->setAreas($data->area_areas ?? null);
                    $areaSmall->setOrder($data->sort_order ?? null);
                    $areaSmall->setUpdateDate($data->update_date ?? null);
                    $areaSmall->setUpdateUser($data->update_user_id ?? null);
                    $areaSmall->setInsertDate($data->insert_date ?? null);
                    $areaSmall->setInsertUser($data->insert_user_id ?? null);
                    $areaSmall->setDeleteFlag($data->delete_flag ?? null);
                }
                array_push($mappedData, $areaSmall);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }
}