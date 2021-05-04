<?php


namespace App\Models\Address;


class District
{
    private $id;
    private $areaName;
    private $areaAreas;
    private $order;
    private $updateDate;
    private $updateUser;
    private $insertDate;
    private $insertUser;
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
    public function getAreaName()
    {
        return $this->areaName;
    }

    /**
     * @param mixed $areaName
     */
    public function setAreaName($areaName): void
    {
        $this->areaName = $areaName;
    }

    /**
     * @return mixed
     */
    public function getAreaAreas()
    {
        return $this->areaAreas;
    }

    /**
     * @param mixed $areaAreas
     */
    public function setAreaAreas($areaAreas): void
    {
        $this->areaAreas = $areaAreas;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
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
    public function getUpdateUser()
    {
        return $this->updateUser;
    }

    /**
     * @param mixed $updateUser
     */
    public function setUpdateUser($updateUser): void
    {
        $this->updateUser = $updateUser;
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
    public function getInsertUser()
    {
        return $this->insertUser;
    }

    /**
     * @param mixed $insertUser
     */
    public function setInsertUser($insertUser): void
    {
        $this->insertUser = $insertUser;
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