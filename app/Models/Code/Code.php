<?php


namespace App\Models\Code;


class Code
{
    private $functionId;
    private $groupId;
    private $codeId;
    private $codeValue;
    private $functionName;
    private $groupName;
    private $codeName;
    private $sortOrder;
    private $updateDate;
    private $updateUser;
    private $insertDate;
    private $insertUser;

    /**
     * @return mixed
     */
    public function getFunctionId()
    {
        return $this->functionId;
    }

    /**
     * @param mixed $functionId
     */
    public function setFunctionId($functionId): void
    {
        $this->functionId = $functionId;
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
    public function getCodeId()
    {
        return $this->codeId;
    }

    /**
     * @param mixed $codeId
     */
    public function setCodeId($codeId): void
    {
        $this->codeId = $codeId;
    }

    /**
     * @return mixed
     */
    public function getCodeValue()
    {
        return $this->codeValue;
    }

    /**
     * @param mixed $codeValue
     */
    public function setCodeValue($codeValue): void
    {
        $this->codeValue = $codeValue;
    }

    /**
     * @return mixed
     */
    public function getFunctionName()
    {
        return $this->functionName;
    }

    /**
     * @param mixed $functionName
     */
    public function setFunctionName($functionName): void
    {
        $this->functionName = $functionName;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param mixed $groupName
     */
    public function setGroupName($groupName): void
    {
        $this->groupName = $groupName;
    }

    /**
     * @return mixed
     */
    public function getCodeName()
    {
        return $this->codeName;
    }

    /**
     * @param mixed $codeName
     */
    public function setCodeName($codeName): void
    {
        $this->codeName = $codeName;
    }

    /**
     * @return mixed
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param mixed $sortOrder
     */
    public function setSortOrder($sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
}