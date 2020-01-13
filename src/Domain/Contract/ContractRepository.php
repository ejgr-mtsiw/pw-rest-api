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
     * @param int $id
     * @return Contract
     * @throws ContractNotFoundException
     */
    public function findContractOfId(int $id): Contract;
}
