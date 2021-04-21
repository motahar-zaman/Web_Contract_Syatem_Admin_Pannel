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

        $queryString = "INSERT INTO mst_group(group_id , group_name, group_name_kana, daihyousha_name, daihyousha_name_kana, zipcode, address_01, address_02, tel_no,
                        fax_no,mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $name, $kana, $representative, $representativeKana, $zip, $address1, $address2, $phn, $fax, $mail, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllGroupData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT group_id, group_name, group_name_kana, daihyousha_name, daihyousha_name_kana, zipcode, address_01, address_02, area_id,
                        prefecture, tel_no, fax_no,mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM mst_group
                        WHERE delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(0);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                $group = new Group();
                if(isset($data)){
                    $group->setId($data->group_id ?? NULL);
                    $group->setName($data->group_name ?? NULL);
                    $group->setNameKana($data->group_name_kana ?? NULL);
                    $group->setRepresentative($data->daihyousha_name ?? NULL);
                    $group->setRepresentativeKana($data->daihyousha_name_kana ?? NULL);
                    $group->setZipCode($data->zipcode ?? NULL);
                    $group->setAddress01($data->address_01 ?? NULL);
                    $group->setAddress02($data->address_02 ?? NULL);
                    $group->setAreaId($data->area_id ?? NULL);
                    $group->setPrefecture($data->prefecture ?? NULL);
                    $group->setTelNo($data->tel_no ?? NULL);
                    $group->setFaxNo($data->fax_no ?? NULL);
                    $group->setMailAddress($data->mail_address ?? NULL);
                    $group->setUpdateDate($data->update_date ?? NULL);
                    $group->setUpdateUserId($data->update_user_id ?? NULL);
                    $group->setInsertDate($data->insert_date ?? NULL);
                    $group->setInsertUserId($data->insert_user_id ?? NULL);
                    $group->setDeleteFlag($data->delete_flag ?? NULL);
                }
                array_push($mappedData, $group);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function deleteData($groupId){
        $queryString = "DELETE FROM mst_group WHERE group_id = ?";
        $queryParameter = array($groupId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }
}