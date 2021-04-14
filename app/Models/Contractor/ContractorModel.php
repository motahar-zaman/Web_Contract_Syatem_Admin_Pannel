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

    public function getAllContractorData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02, tel_no, fax_no, mail_address,
                        temporary, type_contractor, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM mst_contractor WHERE delete_flag = 0
                        ORDER BY update_date DESC";

        return (new Database())->queryExecution($queryString);
    }

    public function mapData($datas = array()){
        $length = count($datas);
        $mappedData = array();

        for($i = 0; $i < $length; $i++){
            $data = $datas[$i];
            $contractor = new Contractor();
            if(isset($data)){
                $contractor->setId($data->contractor_id ?? NULL);
                $contractor->setName($data->contractor_name ?? NULL);
                $contractor->setNameKana($data->contractor_name_kana ?? NULL);
                $contractor->setPassword($data->password ?? NULL);
                $contractor->setZipCode($data->zipcode ?? NULL);
                $contractor->setAddress01($data->address_01 ?? NULL);
                $contractor->setAddress02($data->address_02 ?? NULL);
                $contractor->setTelNo($data->tel_no ?? NULL);
                $contractor->setFaxNo($data->fax_no ?? NULL);
                $contractor->setMailAddress($data->mail_address ?? NULL);
                $contractor->setTemporary($data->temporary ?? NULL);
                $contractor->setType($data->type_contractor ?? NULL);
                $contractor->setUpdateDate($data->update_date ?? NULL);
                $contractor->setUpdateUserId($data->update_user_id ?? NULL);
                $contractor->setInsertDate($data->insert_date ?? NULL);
                $contractor->setInsertUserId($data->insert_user_id ?? NULL);
                $contractor->setDeleteFlag($data->delete_flag ?? NULL);
            }
            array_push($mappedData, $contractor);
        }
        return $mappedData;
    }
}