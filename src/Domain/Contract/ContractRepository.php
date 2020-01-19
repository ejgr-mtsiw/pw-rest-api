<?php
declare(strict_types=1);

namespace App\Domain\Contract;

interface ContractRepository
{
    /**
     * @return Contract[]
     */
    public function findAll(): array;

    /**
     * @return Contract[]
     */
    public function findAllByGroupId(array $groups): array;

    /**
     * @param int $id
     * @return Contract
     * @throws ContractNotFoundException
     */
    public function findContractOfId(int $id): Contract;
}
