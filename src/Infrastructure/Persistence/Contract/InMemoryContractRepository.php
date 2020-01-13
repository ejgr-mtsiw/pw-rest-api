<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contract;

use App\Domain\Contract\Contract;
use App\Domain\Contract\ContractNotFoundException;
use App\Domain\Contract\ContractRepository;

class InMemoryContractRepository implements ContractRepository
{
    /**
     * @var Contract[]
     */
    private $contracts;

    /**
     * InMemoryContractRepository constructor.
     *
     * @param array|null $contracts
     */
    public function __construct(array $contracts = null)
    {
        $this->contracts = $contracts ?? [
            1 => new Contract(1, 171906, "Escola 171906", 286571, 115, 7, '2020-02-06', '2020-01-13', 550, 'concelho A', 'distrito A'),
            2 => new Contract(2, 171906, 'Escola 171906', 286575, 116, 7, '2020-08-31', '2020-01-13', 550, 'concelho A', 'distrito A'),
            3 => new Contract(3, 171906, 'Escola 171906', 286576, 117, 7, '2020-08-31', '2020-01-13', 550, 'concelho A', 'distrito A'),
            4 => new Contract(3, 171906, 'Escola 171906', 286585, 119, 7, '2020-08-31', '2020-01-13', 420, 'concelho A', 'distrito A'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->contracts);
    }

    /**
     * {@inheritdoc}
     */
    public function findContractOfId(int $id): Contract
    {
        if (!isset($this->contracts[$id])) {
            throw new ContractNotFoundException();
        }

        return $this->contracts[$id];
    }
}
