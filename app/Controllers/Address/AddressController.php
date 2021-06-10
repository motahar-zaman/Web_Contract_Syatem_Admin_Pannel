<?php


namespace App\Controllers\Address;


use App\Controllers\BaseController;
use App\Models\Address\AddressModel;


class AddressController extends BaseController
{
    public function getDistrictSubordinateAddress(){
        if( session() && session()->get('login') ) {

            $districtId = $_GET["district"];

            $prefecture = (new AddressModel())->getPrefectureData($districtId);
            $areaLarge = (new AddressModel())->getAreaLargeData($districtId);
            $areaSmall = (new AddressModel())->getAreaSmallData($districtId);
            $area = (new AddressModel())->getAreaData($districtId);

            $data = array(
                "prefecture" => $prefecture,
                "areaLarge" => $areaLarge,
                "areaSmall" => $areaSmall,
                "area" => $area
            );

            return json_encode(['msg' => "Successful", $data, "status" => 1]);
        }
        else{
                return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
            }
    }

    public function getPrefectureSubordinateAddress(){
        if( session() && session()->get('login') ) {

            $districtId = $_GET["district"];
            $prefectureId = $_GET["prefecture"];

            $areaLarge = (new AddressModel())->getAreaLargeData($districtId, $prefectureId);
            $areaSmall = (new AddressModel())->getAreaSmallData($districtId, $prefectureId);
            $area = (new AddressModel())->getAreaData($districtId, $prefectureId);

            $data = array(
                "areaLarge" => $areaLarge,
                "areaSmall" => $areaSmall,
                "area" => $area
            );

            return json_encode(['msg' => "Successful", $data, "status" => 1]);
        }
        else{
                return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
            }
    }

    public function getAreaLargeSubordinateAddress(){
        if( session() && session()->get('login') ) {

            $districtId = $_GET["district"];
            $prefectureId = $_GET["prefecture"];
            $areaLargeId = $_GET["areaLarge"];

            $areaSmall = (new AddressModel())->getAreaSmallData($districtId, $prefectureId, $areaLargeId);
            $area = (new AddressModel())->getAreaData($districtId, $prefectureId, $areaLargeId);

            $data = array(
                "areaSmall" => $areaSmall,
                "area" => $area
            );

            return json_encode(['msg' => "Successful", $data, "status" => 1]);
        }
        else{
                return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
            }
    }

    public function getAreaSmallSubordinateAddress(){
        if( session() && session()->get('login') ) {

            $districtId = $_GET["district"];
            $prefectureId = $_GET["prefecture"];
            $areaLargeId = $_GET["areaLarge"];
            $areaSmallId = $_GET["areaSmall"];

            $area = (new AddressModel())->getAreaData($districtId, $prefectureId, $areaLargeId, $areaSmallId);

            return json_encode(['msg' => "Successful", "area" => $area, "status" => 1]);
        }
        else{
                return json_encode(['msg' => "Not Logged in user", 'status' => 3]);
            }
    }
}