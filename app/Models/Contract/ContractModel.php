<?php


namespace App\Models\Contract;


use App\Models\Database;


class ContractModel
{
    public function storeContractData(Contract $contract){
        $id = $contract->getId();
        $shop = $contract->getShopId();
        $contractor = $contract->getContractorId();
        $tantou = $contract->getTantouId();
        $note = $contract->getNote();
        $update = $contract->getUpdateDate();
        $updateUser = $contract->getUpdateUserId();
        $insert = $contract->getInsertDate();
        $insertUser = $contract->getInsertUserId();
        $delete = $contract->getDeleteFlag();

        $queryString = "INSERT INTO trn_web_contract_base ( contract_id, shop_id, contractor_id, tantou_id, note, update_date,
                        update_user_id, insert_date, insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $shop, $contractor, $tantou, $note, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function storeContractProductData($contractProduct = array()){
        $d = $contractProduct;

        $queryString = "INSERT INTO trn_contract_product (contract_id, branch_no, product_id, contract_status, start_date_year, start_date_month,
                        end_date_year, end_date_month, tantou_id, note, update_date, update_user_id, insert_date, insert_user_id, delete_flag)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($d['id'], $d['branch'], $d['product'], $d['contractStatus'], $d['startYear'], $d['startMonth'], $d['endYear'],
            $d['endMonth'], $d['tantou'], $d['note'], $d['update'], $d['updateUser'], $d['insert'], $d['insertUser'], $d['delete']);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllContract(){
        $data = $this->getAllContractData();
        return $this->mapContractData($data);
    }

    public function getAllContractData(){
        $queryString = "SELECT c.contract_id, shop_id, contractor_id, c.tantou_id, c.note, c.update_date, c.update_user_id, c.insert_date,
            c.insert_user_id, c.delete_flag, branch_no, product_id, contract_status, start_date_year, start_date_month, end_date_year, end_date_month,
            p.note AS product_note FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p ON c.contract_id = p.contract_id 
            WHERE c.delete_flag = ?";

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
                    $contract = new Contract();
                    if(isset($mappedData[$data->contract_id])) {
                        $mappedData[$data->contract_id]->setContractProduct($this->mapContractProduct($data));
                    }
                    else{
                        $contract->setId($data->contract_id ?? NULL);
                        $contract->setContractorId($data->contractor_id ?? NULL);
                        $contract->setShopId($data->shop_id ?? NULL);
                        $contract->setTantouId($data->tantou_id ?? NULL);
                        $contract->setNote($data->note ?? NULL);
                        $contract->setUpdateDate($data->update_date ?? NULL);
                        $contract->setUpdateUserId($data->update_user_id ?? NULL);
                        $contract->setInsertDate($data->insert_date ?? NULL);
                        $contract->setInsertUserId($data->insert_user_id ?? NULL);
                        $contract->setDeleteFlag($data->delete_flag ?? NULL);
                        $contract->setContractProduct($this->mapContractProduct($data));
                    }
                    $mappedData[$contract->getId()] = $contract;
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
        $mapData["contractStatus"] = $data->contract_status ?? NULL;
        $mapData["startDateYear"] = $data->start_date_year ?? NULL;
        $mapData["startDateMonth"] = $data->start_date_month ?? NULL;
        $mapData["endDateYear"] = $data->end_date_year ?? NULL;
        $mapData["endDate_Month"] = $data->end_date_month ?? NULL;
        $mapData["tantouId"] = $data->tantou_id ?? NULL;
        $mapData["note"] = $data->product_note ?? NULL;
        $mapData["name"] = $data->product_name ?? NULL;
        $mapData["note"] = $data->product_note ?? NULL;

        return $mapData;
    }

    public function getContractById($id){
        $data = $this->getContractDataById($id);
        return $this->mapContractData($data);
    }

    public function getContractDataById($id){
        $queryString = "SELECT c.contract_id, shop_id, contractor_id, c.tantou_id, c.note, c.update_date, c.update_user_id, c.insert_date,
            c.insert_user_id, c.delete_flag, branch_no, p.product_id, contract_status, start_date_year, start_date_month, end_date_year, end_date_month,
            p.note AS product_note, mp.product_name, mp.product_note FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p ON
            c.contract_id = p.contract_id LEFT JOIN mst_product AS mp ON mp.product_id = p.product_id WHERE c.contract_id = ? AND c.delete_flag = ?";

        $queryParameter = array($id, 1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function updateContractData(Contract $contract){
        $id = $contract->getId();
        $shop = $contract->getShopId();
        $contractor = $contract->getContractorId();
        $tantou = $contract->getTantouId();
        $note = $contract->getNote();
        $update = $contract->getUpdateDate();
        $updateUser = $contract->getUpdateUserId();

        $queryString = "UPDATE trn_web_contract_base SET shop_id = ?, contractor_id = ?, tantou_id = ?, note = ?, update_date = ?,
                        update_user_id = ? WHERE contract_id = ?";
        $queryParameter = array($shop, $contractor, $tantou, $note, $update, $updateUser, $id);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getContractProductById($contractId, $contractProductId){

        $queryString = "SELECT contract_id, branch_no, product_id, contract_status, start_date_year, start_date_month, end_date_year, end_date_month,
            tantou_id, note, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM trn_contract_product  WHERE contract_id = ?
            AND product_id = ?";

        $queryParameter = array($contractId, $contractProductId);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }
}