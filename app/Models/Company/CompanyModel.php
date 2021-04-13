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

        $queryString = "INSERT INTO mst_company(company_id, company_name, company_name_kana,  representative, representative_kana, zipcode, address_01, address_02,
                        tel_no, fax_no, mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES ('$id', '$name', '$kana', '$representative',
                        '$representativeKana', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$update', '$updateUser', '$insert', '$insertUser', '$delete')";

        return (new Database())->queryExecution($queryString);
    }
}