<?php


namespace App\Models\Group;


use App\Models\Database;

class GroupModel
{
    public function storeGroupData(Group $group){
        $id = $group->getId();
        $name = $group->getName();
        $kana = $group->getNameKana();
        $representative = $group->getRepresentative();
        $representativeKana = $group->getRepresentativeKana();
        $zip = $group->getZipCode();
        $address1 = $group->getAddress01();
        $address2 = $group->getAddress02();
        $phn = $group->getTelNo();
        $fax = $group->getFaxNo();
        $mail = $group->getMailAddress();
        $update = $group->getUpdateDate();
        $updateUser = $group->getUpdateUserId();
        $insert = $group->getInsertDate();
        $insertUser = $group->getInsertUserId();
        $delete = $group->getDeleteFlag();

        $queryString = "INSERT INTO mst_group(group_id , group_name, group_name_kana, representative, representative_kana, zipcode, address_01, address_02, tel_no,
                        fax_no,mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES ('$id', '$name', '$kana', '$representative',
                        '$representativeKana', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$update', '$updateUser', '$insert', '$insertUser', '$delete')";

        return (new Database())->queryExecution($queryString);
    }
}