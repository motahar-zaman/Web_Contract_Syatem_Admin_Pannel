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

    public function getAllContractData(){
        $queryString = "SELECT c.contract_id, shop_id, contractor_id, c.tantou_id, c.note, c.update_date, c.update_user_id, c.insert_date, c.insert_user_id,
            c.delete_flag, branch_no, product_id, contract_status, start_date_year, start_date_month, end_date_year, end_date_month, p.note AS
            product_note FROM trn_web_contract_base AS c LEFT JOIN trn_contract_product AS p ON c.contract_id = p.contract_id WHERE c.delete_flag = ?";

        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }
}