<?php


namespace App\Models\Product;


use App\Models\Database;

class ProductModel
{
    public function storeProductData(Product $product){
        $id = $product->getId();
        $name = $product->getName();
        $official = $product->getNameOfficial();
        $price = $product->getPrice();
        $start = $product->getStartDate();
        $end = $product->getEndDate();
        $service = $product->getServiceType();
        $type = $product->getProductType();
        $shop = $product->getShopType();
        $campaign = $product->getCampaignFlag();
        $note = $product->getProductNote();
        $update = $product->getUpdateDate();
        $updateUser = $product->getUpdateUserId();
        $insert = $product->getInsertDate();
        $insertUser = $product->getInsertUserId();
        $delete = $product->getDeleteFlag();

        $queryString = "INSERT INTO mst_product(product_id, product_name, product_name_official, price, start_date, end_date, service_type, product_type, campaign_flag,
                        shop_type, product_note, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $name, $official, $price, $start, $end, $service, $type, $campaign, $shop, $note, $update, $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

}