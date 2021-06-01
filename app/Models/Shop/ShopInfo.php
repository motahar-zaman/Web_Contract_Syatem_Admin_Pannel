<?php


namespace App\Models\Shop;


class ShopInfo
{
    private $id ;
    private $status;
    private $representative;
    private $representativeKana;
    private $business;
    private $notification;
    private $plId;
    private $pjId;
    private $torihikisakiId;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
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
     * @return mixed
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * @param mixed $business
     */
    public function setBusiness($business): void
    {
        $this->business = $business;
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param mixed $notification
     */
    public function setNotification($notification): void
    {
        $this->notification = $notification;
    }

    /**
     * @return mixed
     */
    public function getPlId()
    {
        return $this->plId;
    }

    /**
     * @param mixed $plId
     */
    public function setPlId($plId): void
    {
        $this->plId = $plId;
    }

    /**
     * @return mixed
     */
    public function getPjId()
    {
        return $this->pjId;
    }

    /**
     * @param mixed $pjId
     */
    public function setPjId($pjId): void
    {
        $this->pjId = $pjId;
    }

    /**
     * @return mixed
     */
    public function getTorihikisakiId()
    {
        return $this->torihikisakiId;
    }

    /**
     * @param mixed $torihikisakiId
     */
    public function setTorihikisakiId($torihikisakiId): void
    {
        $this->torihikisakiId = $torihikisakiId;
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