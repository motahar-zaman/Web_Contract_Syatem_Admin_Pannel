<?php


namespace App\Models\Code;


class Code
{
    private $function_id;
    private $group_id;
    private $code_id;
    private $code_value;
    private $function_name;
    private $group_name;
    private $code_name;
    private $sort_order;
    private $update_date;
    private $update_user_id;
    private $insert_date;
    private $insert_user_id;

    /**
     * @return mixed
     */
    public function getFunctionId()
    {
        return $this->function_id;
    }

    /**
     * @param mixed $function_id
     */
    public function setFunctionId($function_id): void
    {
        $this->function_id = $function_id;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return mixed
     */
    public function getCodeId()
    {
        return $this->code_id;
    }

    /**
     * @param mixed $code_id
     */
    public function setCodeId($code_id): void
    {
        $this->code_id = $code_id;
    }

    /**
     * @return mixed
     */
    public function getCodeValue()
    {
        return $this->code_value;
    }

    /**
     * @param mixed $code_value
     */
    public function setCodeValue($code_value): void
    {
        $this->code_value = $code_value;
    }

    /**
     * @return mixed
     */
    public function getFunctionName()
    {
        return $this->function_name;
    }

    /**
     * @param mixed $function_name
     */
    public function setFunctionName($function_name): void
    {
        $this->function_name = $function_name;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * @param mixed $group_name
     */
    public function setGroupName($group_name): void
    {
        $this->group_name = $group_name;
    }

    /**
     * @return mixed
     */
    public function getCodeName()
    {
        return $this->code_name;
    }

    /**
     * @param mixed $code_name
     */
    public function setCodeName($code_name): void
    {
        $this->code_name = $code_name;
    }

    /**
     * @return mixed
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * @param mixed $sort_order
     */
    public function setSortOrder($sort_order): void
    {
        $this->sort_order = $sort_order;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * @param mixed $update_date
     */
    public function setUpdateDate($update_date): void
    {
        $this->update_date = $update_date;
    }

    /**
     * @return mixed
     */
    public function getUpdateUserId()
    {
        return $this->update_user_id;
    }

    /**
     * @param mixed $update_user_id
     */
    public function setUpdateUserId($update_user_id): void
    {
        $this->update_user_id = $update_user_id;
    }

    /**
     * @return mixed
     */
    public function getInsertDate()
    {
        return $this->insert_date;
    }

    /**
     * @param mixed $insert_date
     */
    public function setInsertDate($insert_date): void
    {
        $this->insert_date = $insert_date;
    }

    /**
     * @return mixed
     */
    public function getInsertUserId()
    {
        return $this->insert_user_id;
    }

    /**
     * @param mixed $insert_user_id
     */
    public function setInsertUserId($insert_user_id): void
    {
        $this->insert_user_id = $insert_user_id;
    }
}