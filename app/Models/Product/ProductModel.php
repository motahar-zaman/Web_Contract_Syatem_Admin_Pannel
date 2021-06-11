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

    public function updateProductData(Product $product){
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

        $queryString = "UPDATE mst_product SET product_name = ?, product_name_official = ?, price = ?, start_date = ?, end_date = ?, service_type = ?, product_type = ?,
                        campaign_flag = ?, shop_type = ?, product_note = ?, update_date = ?, update_user_id = ? WHERE product_id = ?";
        $queryParameter = array($name, $official, $price, $start, $end, $service, $type, $campaign, $shop, $note, $update, $updateUser, $id);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllProductData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT product_id, product_name, product_name_official, price, start_date, end_date, service_type, product_type, campaign_flag,
                        shop_type, product_note, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM mst_product
                        WHERE delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(1);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function deleteData($productId){
        $queryString = "DELETE FROM mst_product WHERE product_id = ?";
        $queryParameter = array($productId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        if(isset($datas) && is_array($datas)){
            $length = count($datas);
            $mappedData = array();

            for($i = 0; $i < $length; $i++){
                $data = $datas[$i];
                $product = new Product();
                if(isset($data)){
                    $product->setId($data->product_id ?? NULL);
                    $product->setName($data->product_name ?? NULL);
                    $product->setNameOfficial($data->product_name_official ?? NULL);
                    $product->setPrice($data->price ?? NULL);
                    $product->setStartDate($data->start_date ?? NULL);
                    $product->setEndDate($data->end_date ?? NULL);
                    $product->setServiceType($data->service_type ?? NULL);
                    $product->setProductType($data->product_type ?? NULL);
                    $product->setCampaignFlag($data->campaign_flag ?? NULL);
                    $product->setShopType($data->shop_type ?? NULL);
                    $product->setProductNote($data->product_note ?? NULL);
                    $product->setUpdateDate($data->update_date ?? NULL);
                    $product->setUpdateUserId($data->update_user_id ?? NULL);
                    $product->setInsertDate($data->insert_date ?? NULL);
                    $product->setInsertUserId($data->insert_date_id ?? NULL);
                    $product->setDeleteFlag($data->delete_flag ?? NULL);
                }
                array_push($mappedData, $product);
            }
            return $mappedData;
        }
        else{
            return $datas;
        }
    }

    public function getDataTableData() {
        $params['draw'] = $_REQUEST['draw'];
        $condition = "";
        $queryParameter = [1];
        
        if (isset($_POST['productId']) && $_POST['productId'] !== '') {
            $condition .= " AND product_id LIKE ?";
            $queryParameter[] = $_POST['productId'];
        }

        if (isset($_POST['productName']) && $_POST['productName'] !== '') {
            $condition .= " AND product_name LIKE ?";
            $queryParameter[] = "%" . $_POST['productName'] . "%";
        }

        $queryString = "SELECT product_id, product_name, product_name_official, price, DATE_FORMAT(start_date, '%Y/%c/%d') AS start_date,
            DATE_FORMAT(end_date, '%Y/%c/%d') AS end_date, service_type, product_type, campaign_flag, shop_type, product_note, update_date,
            update_user_id, insert_date, insert_user_id, delete_flag FROM mst_product WHERE delete_flag = ? {$condition} ORDER BY
            update_date DESC";

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
