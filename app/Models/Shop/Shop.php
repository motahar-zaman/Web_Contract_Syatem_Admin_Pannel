<?php


namespace App\Models\Shop;


class Shop
{
    private $id ;
    private $name;
    private $nameKana;
    private $representative;
    private $representativeKana;
    private $zipcode;
    private $address01;
    private $address02;
    private $areaId;
    private $prefecture;
    private $district;
    private $areaLarge;
    private $areaSmall;
    private $telNo;
    private $faxNo;
    private $mailAddress;
    private $siteUrl;
    private $insertDate;
    private $insertUserId;
    private $updateDate;
    private $updateUserId;
    private $deleteFlag;

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
    public function getRepresentative()
    {
        return $this->representative;
    }

    /**
     * @param mixed $representative
     */
    public function setRepresentative($representative): void
    {
        $this->representative = $representative;
    }

    /**
     * @return mixed
     */
    public function getRepresentativeKana()
    {
        return $this->representativeKana;
    }

    /**
     * @param mixed $representativeKana
     */
    public function setRepresentativeKana($representativeKana): void
    {
        $this->representativeKana = $representativeKana;
    }

    /**
     * @param mixed $shopNameKana
     */
    public function setShopNameKana($shopNameKana): void
    {
        $this->shopNameKana = $shopNameKana;
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
        return $this->address01;
    }

    /**
     * @param mixed $address01
     */
    public function setAddress01($address01): void
    {
        $this->address01 = $address01;
    }

    /**
     * @return mixed
     */
    public function getAddress02()
    {
        return $this->address02;
    }

    /**
     * @param mixed $address02
     */
    public function setAddress02($address02): void
    {
        $this->address02 = $address02;
    }

    /**
     * @return mixed
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * @param mixed $areaId
     */
    public function setAreaId($areaId): void
    {
        $this->areaId = $areaId;
    }

    /**
     * @return mixed
     */
    public function getPrefecture()
    {
        return $this->prefecture;
    }

    /**
     * @param mixed $prefecture
     */
    public function setPrefecture($prefecture): void
    {
        $this->prefecture = $prefecture;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district): void
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getAreaLarge()
    {
        return $this->areaLarge;
    }

    /**
     * @param mixed $areaLarge
     */
    public function setAreaLarge($areaLarge): void
    {
        $this->areaLarge = $areaLarge;
    }

    /**
     * @return mixed
     */
    public function getAreaSmall()
    {
        return $this->areaSmall;
    }

    /**
     * @param mixed $areaSmall
     */
    public function setAreaSmall($areaSmall): void
    {
        $this->areaSmall = $areaSmall;
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
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * @param mixed $siteUrl
     */
    public function setSiteUrl($siteUrl): void
    {
        $this->siteUrl = $siteUrl;
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