<?php


namespace App\Models\Contract;


use App\Models\Database;
use App\Models\Shop\ShopModel;


class ContractModel
{
    public function storeContractData(Contract $contract){
        $id = $contract->getId();
        $contractor = $contract->getContractorId();
        $tantou = $contract->getTantouId();
        $status = $contract->getStatus();
        $note = $contract->getNote();
        $update = $contract->getUpdateDate();
        $updateUser = $contract->getUpdateUserId();
        $insert = $contract->getInsertDate();
        $insertUser = $contract->getInsertUserId();
        $delete = $contract->getDeleteFlag();

        $queryString = "INSERT INTO trn_web_contract_base (contract_id, contractor_id, tantou_id, status, note, update_date,
                        update_user_id, insert_date, insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $contractor, $tantou, $status, $note, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function storeContractProductData($contractProduct = array()){
        $d = $contractProduct;

        $queryString = "INSERT INTO trn_contract_product (contract_id, branch_no, product_id, shop_id, status, start_date_year, start_date_month,
                        end_date_year, end_date_month, tantou_id, note, update_date, update_user_id, insert_date, insert_user_id, delete_flag)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($d['id'], $d['branch'], $d['product'], $d['shop'], $d['contractStatus'], $d['startYear'], $d['startMonth'], $d['endYear'],
            $d['endMonth'], $d['tantou'], $d['note'], $d['update'], $d['updateUser'], $d['insert'], $d['insertUser'], $d['delete']);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllContract($userType = null, $user = null){
        $data = $this->getAllContractData($userType, $user);
        return $this->mapContractData($data);
    }

    public function getAllContractData($userType, $userId){
        $where = "WHERE ";
        if($userType){
            $where .= "c.contractor_id ='$userId' AND ";
        }

        $queryString = "SELECT c.contract_id, c.contractor_id, c.tantou_id, c.status, c.note, c.update_date, c.update_user_id, c.insert_date,
            c.insert_user_id, c.delete_flag, branch_no, p.product_id, p.status AS contract_product_status, p.note AS contract_product_note,
            DATE_FORMAT(mp.start_date, '%Y/%m/%d') AS start_date, DATE_FORMAT(mp.end_date, '%Y/%m/%d') AS end_date, mp.shop_type, mp.service_type,
            mp.product_type, mp.product_name, mp.product_note, s.shop_id, s.shop_name, s.zipcode, s.address_01, s.tel_no, s.mail_address,
            si.shop_daihyo_name, si.notificate_file_path, cntr.contractor_name FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p
            ON c.contract_id = p.contract_id LEFT JOIN mst_product AS mp ON mp.product_id = p.product_id LEFT JOIN mst_shop AS s ON
            s.shop_id = p.shop_id LEFT JOIN trn_shop_info AS si ON s.shop_id = si.shop_id LEFT JOIN mst_contractor AS cntr ON
            cntr.contractor_id = c.contractor_id ".$where." c.delete_flag = ?";

        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapContractData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                if(isset($data)){
                    if(isset($mappedData[$data->contract_id])) {
                        $mappedData[$data->contract_id]->setContractProduct($this->mapContractProduct($data));
                    }
                    else{
                        $contract = new Contract();
                        $contract->setId($data->contract_id ?? NULL);
                        $contract->setContractorId($data->contractor_id ?? NULL);
                        $contract->setTantouId($data->tantou_id ?? NULL);
                        $contract->setStatus($data->status ?? NULL);
                        $contract->setNote($data->note ?? NULL);
                        $contract->setUpdateDate($data->update_date ?? NULL);
                        $contract->setUpdateUserId($data->update_user_id ?? NULL);
                        $contract->setInsertDate($data->insert_date ?? NULL);
                        $contract->setInsertUserId($data->insert_user_id ?? NULL);
                        $contract->setDeleteFlag($data->delete_flag ?? NULL);
                        if($data->product_id){
                            $contract->setContractProduct($this->mapContractProduct($data));
                        }

                        $mappedData[$contract->getId()] = $contract;
                    }
                }
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function mapContractProduct($data){
        $mapData = array();

        $mapData["branchNo"] = $data->branch_no ?? NULL;
        $mapData["productId"] = $data->product_id ?? NULL;
        $mapData["name"] = $data->product_name ?? NULL;
        $mapData["shopId"] = $data->shop_id ?? NULL;
        $mapData["shopName"] = $data->shop_name ?? NULL;
        $mapData["shopNotification"] = $data->notificate_file_path ?? NULL;
        $mapData["status"] = $data->product_status ?? NULL;
        $mapData["price"] = $data->price ?? NULL;
        $mapData["serviceType"] = $data->service_type ?? NULL;
        $mapData["productType"] = $data->product_type ?? NULL;
        $mapData["shopType"] = $data->shop_type ?? NULL;
        $mapData["startDate"] = $data->start_date ?? NULL;
        $mapData["endDate"] = $data->end_date ?? NULL;
        $mapData["tantouId"] = $data->tantou_id ?? NULL;
        $mapData["note"] = $data->product_note ?? NULL;
        $mapData["shopDaihyoName"] = $data->shop_daihyo_name ?? NULL;
        $mapData["shopDetails"] = (new ShopModel())->mapData(array($data))[0] ?? NULL;

        return $mapData;
    }

    public function getContractById($id, $userType = null, $user = null){
        $data = $this->getContractDataById($id, $userType, $user);
        return $this->mapContractData($data);
    }

    public function getContractDataById($id, $userType, $userId){
        $where = "WHERE ";
        if($userType){
            $where .= "c.contractor_id ='$userId' AND ";
        }

        $queryString = "SELECT c.contract_id, c.contractor_id, c.tantou_id, c.status, c.note, c.update_date, c.update_user_id, c.insert_date,
            c.insert_user_id, c.delete_flag, branch_no, p.shop_id, p.product_id, p.status AS product_status, DATE_FORMAT(mp.start_date, '%Y/%m/%d') AS start_date,
            DATE_FORMAT(mp.end_date, '%Y/%m/%d') AS end_date, mp.product_note, mp.product_name, mp.price, mp.product_note, mp.service_type, mp.product_type,
            mp.campaign_flag, mp.shop_type, s.shop_name, s.zipcode, s.address_01, s.tel_no, s.mail_address, si.shop_daihyo_name, si.notificate_file_path,
            si.notificate_file_path FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p ON c.contract_id = p.contract_id LEFT JOIN mst_product AS mp ON 
            mp.product_id = p.product_id LEFT JOIN mst_shop AS s ON s.shop_id = p.shop_id LEFT JOIN trn_shop_info AS si ON s.shop_id = si.shop_id 
            ".$where." c.contract_id = ? AND c.delete_flag = ?";

        $queryParameter = array($id, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function updateContractData(Contract $contract){
        $id = $contract->getId();
        $contractor = $contract->getContractorId();
        $tantou = $contract->getTantouId();
        $status = $contract->getStatus();
        $note = $contract->getNote();
        $update = $contract->getUpdateDate();
        $updateUser = $contract->getUpdateUserId();

        $queryString = "UPDATE trn_web_contract_base SET contractor_id = ?, tantou_id = ?, status = ?, note = ?,
                        update_date = ?, update_user_id = ? WHERE contract_id = ?";
        $queryParameter = array($contractor, $tantou, $status, $note, $update, $updateUser, $id);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function updateContractStatus($contractId, $status, $updateDate, $updateUser){
        $queryString = "UPDATE trn_web_contract_base SET status = ?, update_date = ?, update_user_id = ? WHERE contract_id = ?";

        $queryParameter = array($status, $updateDate, $updateUser, $contractId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getContractProductById($contractId, $contractProductId){

        $queryString = "SELECT contract_id, branch_no, product_id, status, start_date_year, start_date_month, end_date_year, end_date_month,
            tantou_id, note, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM trn_contract_product  WHERE contract_id = ?
            AND product_id = ?";

        $queryParameter = array($contractId, $contractProductId);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function getContractBySearchOptions($contractorId, $contractorName, $productId, $productName, $shopId, $shopName, $prefecture, $tantouId, $userType = null, $user = null){
        $data = $this->getContractDataBySearchOptions($contractorId, $contractorName, $productId, $productName, $shopId, $shopName, $prefecture, $tantouId, $userType, $user);
        return $this->mapContractData($data);
    }

    public function getContractDataBySearchOptions($contractorId, $contractorName, $productId, $productName, $shopId, $shopName, $prefecture, $tantouId, $userType, $userId){
        $where = " WHERE ";
        if($contractorId != ""){
            $where .= "c.contractor_id = '$contractorId' AND ";
        }
        if($tantouId != ""){
            $where .= "c.tantou_id = '$tantouId' AND ";
        }
        if($contractorName != ""){
            $where .= "cntr.contractor_name LIKE '%$contractorName%' AND ";
        }
        if($productId != ""){
            $where .= "p.product_id = '$productId' AND ";
        }
        if($productName != ""){
            $where .= "mp.product_name LIKE '%$productName%' AND ";
        }
        if($shopId != ""){
            $where .= "s.shop_id = '$shopId' AND ";
        }
        if($shopName != ""){
            $where .= "s.shop_name LIKE '%$shopName%' AND ";
        }
        if($prefecture != "0"){
            $where .= "s.prefecture = '$prefecture' AND ";
        }

        if($userType){
            $where .= "c.contractor_id = '$userId' AND ";
        }

        $queryString = "SELECT c.contract_id, c.contractor_id, c.tantou_id, c.status, c.note, c.update_date, c.update_user_id, c.insert_date,
            c.insert_user_id, c.delete_flag, branch_no, p.product_id, p.status AS contract_product_status, p.note AS contract_product_note,
            DATE_FORMAT(mp.start_date, '%Y/%m/%d') AS start_date, DATE_FORMAT(mp.end_date, '%Y/%m/%d') AS end_date, mp.shop_type, mp.service_type,
            mp.product_type, mp.product_name, mp.product_note, s.shop_id, s.shop_name, s.zipcode, s.address_01, s.tel_no, s.mail_address,
            si.shop_daihyo_name, si.notificate_file_path, cntr.contractor_name FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p
            ON c.contract_id = p.contract_id LEFT JOIN mst_product AS mp ON mp.product_id = p.product_id LEFT JOIN mst_shop AS s ON
            s.shop_id = p.shop_id LEFT JOIN trn_shop_info AS si ON s.shop_id = si.shop_id LEFT JOIN mst_contractor AS cntr ON
            cntr.contractor_id = c.contractor_id ".$where." c.delete_flag = ?";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function removeContractProductData($contractId){
        $queryString = "DELETE FROM trn_contract_product WHERE contract_id = ?";
        $queryParameter = array($contractId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function storeContractRingiData($contractRingi = array()){
        $d = $contractRingi;

        $queryString = "INSERT INTO trn_contract_ringi (contract_id, ringi_no, status, update_date, update_user_id, insert_date, insert_user_id, delete_flag)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($d['contract'], $d['ringi'], $d['status'], $d['update'], $d['updateUser'], $d['insert'], $d['insertUser'], $d['delete']);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function removeContractRingiData($contractId){
        $queryString = "DELETE FROM trn_contract_ringi WHERE contract_id = ?";
        $queryParameter = array($contractId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }
}