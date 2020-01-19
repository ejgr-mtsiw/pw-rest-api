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
     * @var int
     */
    private $lastId = 0;

    /**
     * InMemoryContractRepository constructor.
     *
     * @param array|null $contracts
     */
    public function __construct(array $contracts = null)
    {
        $this->contracts = $contracts ?? [
            286571 => new Contract(286571, 171906, "Escola 171906", 115, 7, '2020-02-06', '2020-01-13', '550', 'concelho A', 'distrito A', 'ITED/ITUR', 'Licenciatura/Bacharelato/Especialização Tecnológica'),
            286575 => new Contract(286575, 171906, 'Escola 171906', 116, 7, '2020-08-31', '2020-01-13', '550', 'concelho A', 'distrito A', 'Mediadora entre Escola e Família', 'Licenciatura em Psicologia e com experiência em Mediação de Conflitos'),
            286576 => new Contract(286576, 171906, 'Escola 171906', 117, 7, '2020-08-31', '2020-01-13', '550', 'concelho A', 'distrito A', 'EFA B2+B3 - TIC; EFA B3 - TIC', 'Formação Superior na área de Informática'),
            286585 => new Contract(286585, 171906, 'Escola 171906', 119, 7, '2020-08-31', '2020-01-13', '420', 'concelho A', 'distrito A', 'EFA NS (B +C) - CP; Formador Centro Qualifica', 'Formação superior na área de Gestão de Empresas '),
        ];

        $this->lastId = 4;
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
    public function findAllByGroupId(array $groups): array
    {
        $contracts = [];
        foreach ($this->contracts as $contract) {
            if (in_array($contract->getRecruitmentGroup(), $groups)) {
                $contracts[] = $contract;
            }
        }

        return array_values($contracts);
    }

    /**
     * {@inheritdoc}
     */
    public function findContractOfId(int $id): Contract
    {
        foreach ($this->contracts as $contract) {
            if ($contract->getId() == $id) {
                return $contract;
            }
        }

        throw new ContractNotFoundException();
    }
}
