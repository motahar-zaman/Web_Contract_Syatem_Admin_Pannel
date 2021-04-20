<?php

namespace App\Models\Contractor;

class Contractor{
    private $id;
    private $name;
    private $nameKana;
    private $password;
    private $zipCode;
    private $address_01;
    private $address_02;
    private $telNo;
    private $faxNo;
    private $mailAddress;
    private $companyId;
    private $groupId;
    private $type;
    private $updateDate;
    private $updateUserId;
    private $insertDate;
    private $insertUserId;
    private $deleteFlag;
    private $temporary;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameKana()
    {
        return $this->nameKana;
    }

    /**
     * @param mixed $nameKana
     */
    public function setNameKana($nameKana): void
    {
        $this->nameKana = $nameKana;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
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
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param mixed $groupId
     */
    public function setGroupId($groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
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

    /**
     * @return mixed
     */
    public function getTemporary()
    {
        return $this->temporary;
    }

    /**
     * @param mixed $temporary
     */
    public function setTemporary($temporary): void
    {
        $this->temporary = $temporary;
    }
}