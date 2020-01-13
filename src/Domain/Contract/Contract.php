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
    private $sigrheContractCode;

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
     * @param int|null  $id
     * @param int    $schoolCode
     * @param string    $schoolName
     * @param int    $sigrheContractCode
     * @param int    $contractNumber
     * @param int    $nHoursPerWeek
     * @param string    $contractEndDate
     * @param string    $applicationDeadline
     * @param int    $recruitmentGroup
     * @param string    $county
     * @param string    $district
     */
    public function __construct(?int $id, int $schoolCode, string $schoolName, int $sigrheContractCode, int $contractNumber, int $nHoursPerWeek, string $contractEndDate, string $applicationDeadline, int $recruitmentGroup, string $county, string $district)
    {
        $this->id = $id;
        $this->schoolCode = $schoolCode;
        $this->schoolName = $schoolName;
        $this->sigrheContractCode = $sigrheContractCode;
        $this->contractNumber = $contractNumber;
        $this->nHoursPerWeek = $nHoursPerWeek;
        $this->contractEndDate = $contractEndDate;
        $this->applicationDeadline = $applicationDeadline;
        $this->recruitmentGroup = $recruitmentGroup;
        $this->county = $county;
        $this->district = $district;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
    public function getSigrheContractCode(): int
    {
        return $this->sigrheContractCode;
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
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'schoolCode' => $this->schoolCode,
            'schoolName' => $this->schoolName,
            'sigrheContractCode' => $this->sigrheContractCode,
            'contractNumber' => $this->contractNumber,
            'nHoursPerWeek' => $this->nHoursPerWeek,
            'contractEndDate' => $this->contractEndDate,
            'applicationDeadline' => $this->applicationDeadline,
            'recruitmentGroup' => $this->recruitmentGroup,
            'county' => $this->county,
            'district' => $this->district,
        ];
    }
}
