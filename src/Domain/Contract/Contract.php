<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use JsonSerializable;

class Contract implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int
     */
    private $schoolCode;

    /**
     * @var string
     */
    private $schoolName;

    /**
     * @var int
     */
    private $contractNumber;

    /**
     * @var int
     */
    private $nHoursPerWeek;

    /**
     * @var string
     */
    private $contractEndDate;

    /**
     * @var string
     */
    private $applicationDeadline;

    /**
     * @var int
     */
    private $recruitmentGroup;

    /**
     * @var string
     */
    private $county;

    /**
     * @var string
     */
    private $district;

    /**
     * @var string
     */
    private $classProject;

    /**
     * @var string
     */
    private $qualifications;

    /**
     * @param int|null  $id
     * @param int    $schoolCode
     * @param string    $schoolName
     * @param int    $contractNumber
     * @param int    $nHoursPerWeek
     * @param string    $contractEndDate
     * @param string    $applicationDeadline
     * @param string    $recruitmentGroup
     * @param string    $county
     * @param string    $district
     * @param string    $classProject
     * @param string    $qualifications
     */
    public function __construct(
        ?int $id,
        int $schoolCode,
        string $schoolName,
        int $contractNumber,
        int $nHoursPerWeek,
        string $contractEndDate,
        string $applicationDeadline,
        string $recruitmentGroup,
        string $county,
        string $district,
        string $classProject,
        string $qualifications
    ) {
        $this->id = $id;
        $this->schoolCode = $schoolCode;
        $this->schoolName = $schoolName;
        $this->contractNumber = $contractNumber;
        $this->nHoursPerWeek = $nHoursPerWeek;
        $this->contractEndDate = $contractEndDate;
        $this->applicationDeadline = $applicationDeadline;
        $this->recruitmentGroup = $recruitmentGroup;
        $this->county = $county;
        $this->district = $district;
        $this->classProject = $classProject;
        $this->qualifications = $qualifications;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getSchoolCode(): int
    {
        return $this->schoolCode;
    }

    /**
     * @return string
     */
    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    /**
     * @return int
     */
    public function getContractNumber(): int
    {
        return $this->contractNumber;
    }

    /**
     * @return int
     */
    public function getNHoursPerWeek(): int
    {
        return $this->nHoursPerWeek;
    }

    /**
     * @return string
     */
    public function getContractEndDate(): string
    {
        return $this->contractEndDate;
    }

    /**
     * @return string
     */
    public function getApplicationDeadline(): string
    {
        return $this->applicationDeadline;
    }

    /**
     * @return int
     */
    public function getRecruitmentGroup(): int
    {
        return $this->recruitmentGroup;
    }

    /**
     * @return string
     */
    public function getCounty(): string
    {
        return $this->county;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @return string
     */
    public function getClassProject(): string
    {
        return $this->classProject;
    }

    /**
     * @return string
     */
    public function getQualifications(): string
    {
        return $this->qualifications;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'schoolCode' => $this->schoolCode,
            'schoolName' => $this->schoolName,
            'contractNumber' => $this->contractNumber,
            'nHoursPerWeek' => $this->nHoursPerWeek,
            'contractEndDate' => $this->contractEndDate,
            'applicationDeadline' => $this->applicationDeadline,
            'recruitmentGroup' => $this->recruitmentGroup,
            'county' => $this->county,
            'district' => $this->district,
            'classProject' => $this->classProject,
            'qualifications' => $this->qualifications,
        ];
    }

    /**
     * @param object
     * @return Contract
     */
    public static function fromObject(object $row)
    {
        $contract = new Contract(
            $row->id,
            $row->school_code,
            $row->school_name,
            $row->n_contract,
            $row->n_hours_per_week,
            $row->contract_end_date,
            $row->application_deadline,
            $row->recruitment_group,
            $row->county,
            $row->district,
            $row->class_project,
            $row->qualifications
        );

        return $contract;
    }
}
