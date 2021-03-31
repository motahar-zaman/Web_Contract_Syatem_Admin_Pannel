<?php

namespace App\Models\Contractor;

class Contractor{
    private $contractorId;
    private $contractorName;
    private $contractorNameKana;
    private $zipcode;
    private $address_01;
    private $address_02;
    private $telNo;
    private $faxNo;
    private $mailAddress;
    private $typeContractor;
    private $updateDate;
    private $updateUserId;
    private $insertDate;
    private $insertUserId;
    private $deleteFlag;

    /**
     * @return mixed
     */
    public function getContractorId()
    {
        return $this->contractorId;
    }

    /**
     * @param mixed $contractorId
     */
    public function setContractorId($contractorId): void
    {
        $this->contractorId = $contractorId;
    }

    /**
     * @return mixed
     */
    public function getContractorName()
    {
        return $this->contractorName;
    }

    /**
     * @param mixed $contractorName
     */
    public function setContractorName($contractorName): void
    {
        $this->contractorName = $contractorName;
    }

    /**
     * @return mixed
     */
    public function getContractorNameKana()
    {
        return $this->contractorNameKana;
    }

    /**
     * @param mixed $contractorNameKana
     */
    public function setContractorNameKana($contractorNameKana): void
    {
        $this->contractorNameKana = $contractorNameKana;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getAddress01()
    {
        return $this->address_01;
    }

    /**
     * @param mixed $address_01
     */
    public function setAddress01($address_01): void
    {
        $this->address_01 = $address_01;
    }

    /**
     * @return mixed
     */
    public function getAddress02()
    {
        return $this->address_02;
    }

    /**
     * @param mixed $address_02
     */
    public function setAddress02($address_02): void
    {
        $this->address_02 = $address_02;
    }

    /**
     * @return mixed
     */
    public function getTelNo()
    {
        return $this->telNo;
    }

    /**
     * @param mixed $telNo
     */
    public function setTelNo($telNo): void
    {
        $this->telNo = $telNo;
    }

    /**
     * @return mixed
     */
    public function getFaxNo()
    {
        return $this->faxNo;
    }

    /**
     * @param mixed $faxNo
     */
    public function setFaxNo($faxNo): void
    {
        $this->faxNo = $faxNo;
    }

    /**
     * @return mixed
     */
    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    /**
     * @param mixed $mailAddress
     */
    public function setMailAddress($mailAddress): void
    {
        $this->mailAddress = $mailAddress;
    }

    /**
     * @return mixed
     */
    public function getTypeContractor()
    {
        return $this->typeContractor;
    }

    /**
     * @param mixed $typeContractor
     */
    public function setTypeContractor($typeContractor): void
    {
        $this->typeContractor = $typeContractor;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param mixed $updateDate
     */
    public function setUpdateDate($updateDate): void
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return mixed
     */
    public function getUpdateUserId()
    {
        return $this->updateUserId;
    }

    /**
     * @param mixed $updateUserId
     */
    public function setUpdateUserId($updateUserId): void
    {
        $this->updateUserId = $updateUserId;
    }

    /**
     * @return mixed
     */
    public function getInsertDate()
    {
        return $this->insertDate;
    }

    /**
     * @param mixed $insertDate
     */
    public function setInsertDate($insertDate): void
    {
        $this->insertDate = $insertDate;
    }

    /**
     * @return mixed
     */
    public function getInsertUserId()
    {
        return $this->insertUserId;
    }

    /**
     * @param mixed $insertUserId
     */
    public function setInsertUserId($insertUserId): void
    {
        $this->insertUserId = $insertUserId;
    }

    /**
     * @return mixed
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * @param mixed $deleteFlag
     */
    public function setDeleteFlag($deleteFlag): void
    {
        $this->deleteFlag = $deleteFlag;
    }
}