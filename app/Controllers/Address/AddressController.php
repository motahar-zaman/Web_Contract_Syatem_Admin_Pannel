<?php


namespace App\Controllers\Address;


use App\Controllers\BaseController;
use App\Models\Address\AddressModel;


class AddressController extends BaseController
{
    public function getDistrictSubordinateAddress($districtId){
        if( session() && session()->get('login') ) {
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
}