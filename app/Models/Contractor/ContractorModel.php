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
        $company = $contractor->getCompanyId();
        $group = $contractor->getGroupId();
        $type = $contractor->getType();
        $update = $contractor->getUpdateDate();
        $updateUser = $contractor->getUpdateUserId();
        $insert = $contractor->getInsertDate();
        $insertUser = $contractor->getInsertUserId();
        $delete = $contractor->getDeleteFlag();

        $queryString = "INSERT INTO mst_contractor(contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02,
                        tel_no, fax_no, mail_address, company_id, group_id, type_contractor, update_date, update_user_id, insert_date,
                        insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $name, $kana, $password, $zip, $address1, $address2, $phn, $fax, $mail, $company, $group, $type,
            $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function updateContractorData(Contractor $contractor){
        $id = $contractor->getId();
        $name = $contractor->getName();
        $kana = $contractor->getNameKana();
        $zip = $contractor->getZipCode();
        $address1 = $contractor->getAddress01();
        $address2 = $contractor->getAddress02();
        $phn = $contractor->getTelNo();
        $mail = $contractor->getMailAddress();
        $company = $contractor->getCompanyId();
        $group = $contractor->getGroupId();
        $update = $contractor->getUpdateDate();
        $updateUser = $contractor->getUpdateUserId();

        $queryString = "UPDATE mst_contractor SET contractor_name = ?, contractor_name_kana = ?, zipcode = ?, address_01 = ?, address_02 = ?,
                        tel_no = ?, mail_address = ?, company_id = ?, group_id = ?, update_date = ?, update_user_id = ? WHERE contractor_id = ?";
        $queryParameter = array($name, $kana, $zip, $address1, $address2, $phn, $mail, $company, $group, $update, $updateUser, $id);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllContractorData($userType = null, $userId = null){
        $data = $this->getAllData($userType, $userId);
        return $this->mapData($data);
    }

    public function getAllData($userType, $userId){
        $where = " WHERE ";
        if($userType){
            $where .= "(insert_user_id = '$userId' OR contractor_id ='$userId') AND ";
        }

        $queryString = "SELECT contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02, tel_no, fax_no,
                        mail_address, company_id, group_id, temporary, type_contractor, update_date, update_user_id, insert_date, insert_user_id,
                        delete_flag FROM mst_contractor".$where."delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
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
                    $contractor->setCompanyId($data->company_id ?? NULL);
                    $contractor->setGroupId($data->group_id ?? NULL);
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
        else{
            return $datas;
        }
    }

    public function deleteData($contractorId){
        $queryString = "DELETE FROM mst_contractor WHERE contractor_id = ?";
        $queryParameter = array($contractorId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getContractorDetailsById($contractorId, $userType = null, $userId = null){
        $data = $this->getContractorDetailsDataById($contractorId, $userType, $userId);
        return $this->mapContractorDetailsData($data);
    }

    public function getContractorDetailsDataById($contractorId, $userType = null, $userId = null){
        $where = "WHERE ";
        if($userType){
            if($contractorId != $userId){
                $where .= "con.insert_user_id = '$userId' AND ";
            }
        }

        $queryString = "SELECT con.contractor_id, con.contractor_name, con.contractor_name_kana, con.zipcode, con.address_01, con.address_02,
                        con.tel_no, con.mail_address, con.company_id, con.group_id, con.temporary, con.type_contractor, con.update_date,
                        con.update_user_id, con.insert_date, con.insert_user_id, con.delete_flag, com.company_name, com.company_name_kana,
                        com.daihyousha_name AS companyDaihyousha, com.daihyousha_name_kana AS companyDaihyoushaKana, com.zipcode AS companyZip,
                        com.address_01 AS companyAddress01, com.address_02 AS companyAddress02, com.tel_no AS companyPhn, com.mail_address
                        AS companyMail, com.update_date AS companyUpdate, com.update_user_id AS companyUpdateUser, com.insert_date AS
                        companyInsertDate, com.insert_user_id AS companyInsertUser, grp.group_name, grp.group_name_kana, grp.daihyousha_name
                        AS groupDaihyousha, grp.daihyousha_name_kana AS groupDaihyoushaKana, grp.zipcode AS groupZip, grp.address_01
                        AS groupAddress01, grp.address_02 AS groupAddress02, grp.tel_no AS groupPhn, grp.mail_address AS groupMail, grp.update_date
                        AS groupUpdateDate, grp.update_user_id AS groupUpdateUser, grp.insert_date AS groupInsertDate, grp.insert_user_id AS
                        groupInsertUser FROM mst_contractor AS con LEFT JOIN mst_company AS com ON con.company_id = com.company_id LEFT JOIN
                        mst_group AS grp ON con.group_id = grp.group_id ".$where." con.contractor_id = ? AND con.delete_flag = ?";

        $queryParameter = array($contractorId, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapContractorDetailsData($data){
        return $data;
    }

    public function getContractorById($contractorId){
        $data = $this->getContractorDataById($contractorId);
        return $this->mapData($data);
    }

    public function getContractorDataById($contractorId){
        $queryString = "SELECT contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02, tel_no, fax_no,
                        mail_address, company_id, group_id, temporary, type_contractor, update_date, update_user_id, insert_date, insert_user_id,
                        delete_flag FROM mst_contractor WHERE contractor_id = ? AND delete_flag = ?";
        $queryParameter = array($contractorId, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function getContractorByName($contractorName, $companyId, $companyName, $groupId, $groupName, $userType = null, $userId = null){
        $data = $this->getContractorDataByName($contractorName, $companyId, $companyName, $groupId, $groupName, $userType, $userId);
        return $this->mapData($data);
    }

    public function getContractorDataByName($contractorName, $companyId, $companyName, $groupId, $groupName, $userType, $userId){
        $where = " WHERE ";
        if($contractorName != ""){
            $where .= "con.contractor_name like '%$contractorName%' AND ";
        }
        if($companyId != ""){
            $where .= "con.company_id = '$companyId' AND ";
        }
        if($companyName != ""){
            $where .= "com.company_name LIKE '%$companyName%' AND ";
        }
        if($groupId != ""){
            $where .= "con.group_id = '$groupId' AND ";
        }
        if($groupName != ""){
            $where .= "g.group_name LIKE '%$groupName%' AND ";
        }

        if($userType){
            $where .= "(con.insert_user_id = '$userId' OR con.contractor_id ='$userId') AND ";
        }

        $queryString = "SELECT contractor_id, contractor_name, contractor_name_kana, password, con.zipcode, con.address_01, con.address_02, con.tel_no,
                        con.fax_no, con.mail_address, com.company_id, com.company_name, g.group_id, g.group_name, temporary, type_contractor, con.update_date,
                        con.update_user_id, con.insert_date, con.insert_user_id, con.delete_flag FROM mst_contractor AS con LEFT JOIN mst_company AS com ON
                        con.company_id = com.company_id LEFT JOIN mst_group AS g ON con.group_id = g.group_id".$where."con.delete_flag = ? ORDER BY insert_date DESC";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function getDataTableData($companyInfo = false, $groupInfo = false, $userType = null, $userId = null) {
        $params['draw'] = $_REQUEST['draw'];
        $condition = "";
        $extSelect = "";
        $extJoin = "";
        $queryParameter = [1];

        if (isset($_POST['contractorId']) && $_POST['contractorId'] !== '') {
            $condition .= " AND contractor_id LIKE ?";
            $queryParameter[] = $_POST['contractorId'];
        }

        if (isset($_POST['contractorName']) && $_POST['contractorName'] !== '') {
            $condition .= " AND contractor_name LIKE ?";
            $queryParameter[] = "%" . $_POST['contractorName'] . "%";
        }

        if ($companyInfo) {
            $extSelect .= ", IF(ISNULL(mc.company_id), '', CONCAT(IFNULL(mc.company_id, ''), '=>', IFNULL(mc.company_name, ''), '=>', IFNULL(mc.company_name_kana, ''),
            '=>', IFNULL(mc.daihyousha_name, ''), '=>', IFNULL(mc.daihyousha_name_kana, ''), '=>', IFNULL(mc.zipcode, ''), '=>', IFNULL(mc.address_01, ''), '=>',
            IFNULL(mc.address_02, ''), '=>', IFNULL(mc.tel_no, ''), '=>', IFNULL(mc.fax_no, ''), '=>', IFNULL(mc.mail_address, ''), '=>', IFNULL(mc.site_url, ''), '=>',
            IFNULL(mc.update_date, ''), '=>', IFNULL(mc.update_user_id, ''), '=>', IFNULL(mc.insert_date, ''), '=>', IFNULL(mc.insert_user_id, ''), '=>',
            IFNULL(mc.delete_flag, ''))) AS company_data";
            $extJoin .= " LEFT JOIN mst_company as mc ON mc.company_id = mcon.company_id";
        }

        if ($groupInfo) {
            $extSelect .= ", IF(ISNULL(mgrp.group_id), '', CONCAT(IFNULL(mgrp.group_id, ''), '=>', IFNULL(mgrp.group_name, ''), '=>',
            IFNULL(mgrp.group_name_kana, ''), '=>', IFNULL(mgrp.daihyousha_name, ''), '=>', IFNULL(mgrp.daihyousha_name_kana, ''), '=>', IFNULL(mgrp.zipcode, ''),
            '=>', IFNULL(mgrp.address_01, ''), '=>', IFNULL(mgrp.address_02, ''), '=>', IFNULL(mgrp.area_id, ''), '=>', IFNULL(mgrp.prefecture, ''), '=>',
            IFNULL(mgrp.tel_no, ''), '=>', IFNULL(mgrp.fax_no, ''), '=>', IFNULL(mgrp.mail_address, ''), '=>', IFNULL(mgrp.update_date, ''), '=>',
            IFNULL(mgrp.update_user_id, ''), '=>', IFNULL(mgrp.insert_date, ''), '=>', IFNULL(mgrp.insert_user_id, ''), '=>',
            IFNULL(mgrp.delete_flag, ''))) AS group_data";
            $extJoin .= " LEFT JOIN mst_group as mgrp ON mgrp.group_id = mcon.group_id";
        }

        if($userType){
            $condition .= " AND (mcon.insert_user_id = '$userId' OR mcon.contractor_id ='$userId')";
        }

        $queryString = "SELECT mcon.contractor_id, mcon.contractor_name, mcon.contractor_name_kana, mcon.password, mcon.zipcode, mcon.address_01, mcon.address_02,
            mcon.tel_no, mcon.fax_no, mcon.mail_address, mcon.company_id, mcon.group_id, mcon.temporary, mcon.type_contractor, mcon.update_date, mcon.update_user_id,
            mcon.insert_date, mcon.insert_user_id, mcon.delete_flag {$extSelect} FROM mst_contractor AS mcon {$extJoin} WHERE mcon.delete_flag = ? {$condition}
            ORDER BY mcon.update_date DESC";

        $data = (new Database())->readQueryExecution($queryString, $queryParameter);
        $jsonData = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => $data ? count($data) : 0,
            "recordsFiltered" => $data ? count($data) : 0,
            "data" => $data
        );

        return $jsonData;
    }
}
