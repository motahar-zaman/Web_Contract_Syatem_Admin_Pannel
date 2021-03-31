<?php

namespace App\Models\Employee;

class Employee{
    private $employeeId;
    private $employeeName;
    private $employeeNameKana;
    private $updateDate;
    private $updateUserId;
    private $insertDate;
    private $insertUserId;
    private $deleteFlag;

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    /**
     * @param mixed $employeeName
     */
    public function setEmployeeName($employeeName): void
    {
        $this->employeeName = $employeeName;
    }

    /**
     * @return mixed
     */
    public function getEmployeeNameKana()
    {
        return $this->employeeNameKana;
    }

    /**
     * @param mixed $employeeNameKana
     */
    public function setEmployeeNameKana($employeeNameKana): void
    {
        $this->employeeNameKana = $employeeNameKana;
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