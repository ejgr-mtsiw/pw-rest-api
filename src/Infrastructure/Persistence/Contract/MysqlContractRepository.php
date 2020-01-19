<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contract;

use App\Domain\Contract\Contract;
use App\Domain\Contract\ContractNotFoundException;
use App\Domain\Contract\ContractRepository;
use Illuminate\Database\Capsule\Manager as DB;

class MysqlContractRepository implements ContractRepository
{
    /**
     * @var Contract[]
     */
    private $contracts;

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $rows = DB::table('contracts')->get();

        $contracts = [];
        foreach ($rows as $row) {
            $contracts[] = Contract::fromObject($row);
        }

        return $contracts;
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByGroupId(array $groups): array
    {
        $rows = DB::table('contracts')
            ->whereIn('recruitment_group', $groups)
            ->get();

        $contracts = [];
        foreach ($rows as $row) {
            $contracts[] = Contract::fromObject($row);
        }

        return $contracts;
    }

    /**
     * {@inheritdoc}
     */
    public function findContractOfId(int $id): Contract
    {
        $row = DB::table('contracts')->find($id);

        if (empty($row)) {
            throw new ContractNotFoundException();
        }

        $contract = Contract::fromObject($row);
        return $contract;
    }
}
