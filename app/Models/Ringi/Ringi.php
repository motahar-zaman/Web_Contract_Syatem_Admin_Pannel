<?php


namespace App\Models\Ringi;


class Ringi
{
    private $no;
    private $applicantName;
    private $type;
    private $targetArea;
    private $targetName;
    private $discountServiceType;
    private $detail;
    private $summaryCondition;
    private $beforeSummaryPrice;
    private $afterSummaryPrice;
    private $summaryPeriod;
    private $startDate;
    private $endDate;
    private $purpose;
    private $memo;
    private $delete_flag;

    /**
     * @return mixed
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param mixed $no
     */
    public function setNo($no): void
    {
        $this->no = $no;
    }

    /**
     * @return mixed
     */
    public function getApplicantName()
    {
        return $this->applicantName;
    }

    /**
     * @param mixed $applicantName
     */
    public function setApplicantName($applicantName): void
    {
        $this->applicantName = $applicantName;
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
    public function getTargetArea()
    {
        return $this->targetArea;
    }

    /**
     * @param mixed $targetArea
     */
    public function setTargetArea($targetArea): void
    {
        $this->targetArea = $targetArea;
    }

    /**
     * @return mixed
     */
    public function getTargetName()
    {
        return $this->targetName;
    }

    /**
     * @param mixed $targetName
     */
    public function setTargetName($targetName): void
    {
        $this->targetName = $targetName;
    }

    /**
     * @return mixed
     */
    public function getDiscountServiceType()
    {
        return $this->discountServiceType;
    }

    /**
     * @param mixed $discountServiceType
     */
    public function setDiscountServiceType($discountServiceType): void
    {
        $this->discountServiceType = $discountServiceType;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param mixed $detail
     */
    public function setDetail($detail): void
    {
        $this->detail = $detail;
    }

    /**
     * @return mixed
     */
    public function getSummaryCondition()
    {
        return $this->summaryCondition;
    }

    /**
     * @param mixed $summaryCondition
     */
    public function setSummaryCondition($summaryCondition): void
    {
        $this->summaryCondition = $summaryCondition;
    }

    /**
     * @return mixed
     */
    public function getBeforeSummaryPrice()
    {
        return $this->beforeSummaryPrice;
    }

    /**
     * @param mixed $beforeSummaryPrice
     */
    public function setBeforeSummaryPrice($beforeSummaryPrice): void
    {
        $this->beforeSummaryPrice = $beforeSummaryPrice;
    }

    /**
     * @return mixed
     */
    public function getAfterSummaryPrice()
    {
        return $this->afterSummaryPrice;
    }

    /**
     * @param mixed $afterSummaryPrice
     */
    public function setAfterSummaryPrice($afterSummaryPrice): void
    {
        $this->afterSummaryPrice = $afterSummaryPrice;
    }

    /**
     * @return mixed
     */
    public function getSummaryPeriod()
    {
        return $this->summaryPeriod;
    }

    /**
     * @param mixed $summaryPeriod
     */
    public function setSummaryPeriod($summaryPeriod): void
    {
        $this->summaryPeriod = $summaryPeriod;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param mixed $purpose
     */
    public function setPurpose($purpose): void
    {
        $this->purpose = $purpose;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    public function setMemo($memo): void
    {
        $this->memo = $memo;
    }

    /**
     * @return mixed
     */
    public function getDeleteFlag()
    {
        return $this->delete_flag;
    }

    /**
     * @param mixed $delete_flag
     */
    public function setDeleteFlag($delete_flag): void
    {
        $this->delete_flag = $delete_flag;
    }
}