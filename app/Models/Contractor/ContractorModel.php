<?php


namespace App\Models\Contractor;


use App\Models\Database;

class ContractorModel
{
    public function storeContractorData(Contractor $contractor){
        $id = $contractor->getId();
        $name = $contractor->getName();
        $kana = $contractor->getNameKana();
        $password = $contractor->getPassword();
        $zip = $contractor->getZipCode();
        $address1 = $contractor->getAddress01();
        $address2 = $contractor->getAddress02();
        $phn = $contractor->getTelNo();
        $fax = $contractor->getFaxNo();
        $mail = $contractor->getMailAddress();
        $type = $contractor->getType();
        $update = $contractor->getUpdateDate();
        $updateUser = $contractor->getUpdateUserId();
        $insert = $contractor->getInsertDate();
        $insertUser = $contractor->getInsertUserId();
        $delete = $contractor->getDeleteFlag();
        $temp = $contractor->getTemporary();

        $queryString = "INSERT INTO mst_contractor(contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02, tel_no, fax_no,
                        mail_address, type_contractor, update_date, update_user_id, insert_date, insert_user_id, delete_flag, temporary) VALUES ('$id', '$name', '$kana',
                        '$password', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$type', '$update', '$updateUser', '$insert', '$insertUser', '$delete', '$temp')";

        return (new Database())->queryExecution($queryString);
    }
}