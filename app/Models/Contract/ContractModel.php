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
}