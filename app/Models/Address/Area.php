<?php


namespace App\Models\Address;


class Area
{
    private $id;
    private $district;
    private $prefecture;
    private $large;
    private $small;
    private $name;
    private $areas;
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
    public function getLarge()
    {
        return $this->large;
    }

    /**
     * @param mixed $large
     */
    public function setLarge($large): void
    {
        $this->large = $large;
    }

    /**
     * @return mixed
     */
    public function getSmall()
    {
        return $this->small;
    }

    /**
     * @param mixed $small
     */
    public function setSmall($small): void
    {
        $this->small = $small;
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
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param mixed $areas
     */
    public function setAreas($areas): void
    {
        $this->areas = $areas;
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