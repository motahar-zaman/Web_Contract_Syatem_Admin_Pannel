<?php


namespace App\Models\Company;


use App\Models\Database;

class CompanyModel
{
    public function storeCompanyData(Company $company){
        $id = $company->getId();
        $name = $company->getName();
        $kana = $company->getNameKana();
        $representative = $company->getRepresentative();
        $representativeKana = $company->getRepresentativeKana();
        $zip = $company->getZipCode();
        $address1 = $company->getAddress01();
        $address2 = $company->getAddress02();
        $phn = $company->getTelNo();
        $fax = $company->getFaxNo();
        $mail = $company->getMailAddress();
        $update = $company->getUpdateDate();
        $updateUser = $company->getUpdateUserId();
        $insert = $company->getInsertDate();
        $insertUser = $company->getInsertUserId();
        $delete = $company->getDeleteFlag();

        $queryString = "INSERT INTO mst_company(company_id, company_name, company_name_kana, daihyousha_name, daihyousha_name_kana, zipcode,
                        address_01, address_02,tel_no, fax_no, mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParameter = array($id, $name, $kana, $representative, $representativeKana, $zip, $address1, $address2, $phn, $fax, $mail, $update,
            $updateUser, $insert, $insertUser, $delete);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }

    public function getAllCompanyData(){
        $data = $this->getAllData();
        return $this->mapData($data);
    }

    public function getAllData(){
        $queryString = "SELECT company_id, company_name, company_name_kana, daihyousha_name, daihyousha_name_kana, zipcode, address_01, address_02,
                        tel_no, fax_no,mail_address, site_url, update_date, update_user_id, insert_date, insert_user_id, delete_flag FROM mst_company
                        WHERE delete_flag = ? ORDER BY update_date DESC";
        $queryParameter = array(0);

        return (new Database())->readQueryExecution($queryString, $queryParameter);
    }

    public function mapData($datas = array()){
        $length = count($datas);
        $mappedData = array();

        for($i = 0; $i < $length; $i++){
            $data = $datas[$i];
            $company = new Company();
            if(isset($data)){
                $company->setId($data->company_id ?? NULL);
                $company->setName($data->company_name ?? NULL);
                $company->setNameKana($data->company_name_kana ?? NULL);
                $company->setRepresentative($data->daihyousha_name ?? NULL);
                $company->setRepresentativeKana($data->daihyousha_name_kana ?? NULL);
                $company->setZipCode($data->zipcode ?? NULL);
                $company->setAddress01($data->address_01 ?? NULL);
                $company->setAddress02($data->address_02 ?? NULL);
                $company->setTelNo($data->tel_no ?? NULL);
                $company->setFaxNo($data->fax_no ?? NULL);
                $company->setMailAddress($data->mail_address ?? NULL);
                $company->setSiteUrl($data->site_url ?? NULL);
                $company->setUpdateDate($data->update_date ?? NULL);
                $company->setUpdateUserId($data->update_user_id ?? NULL);
                $company->setInsertDate($data->insert_date ?? NULL);
                $company->setInsertUserId($data->insert_user_id ?? NULL);
                $company->setDeleteFlag($data->delete_flag ?? NULL);
            }
            array_push($mappedData, $company);
        }
        return $mappedData;
    }

    public function deleteData($companyId){
        $queryString = "DELETE FROM mst_company WHERE company_id = ?";
        $queryParameter = array($companyId);

        return (new Database())->writeQueryExecution($queryString, $queryParameter);
    }
}