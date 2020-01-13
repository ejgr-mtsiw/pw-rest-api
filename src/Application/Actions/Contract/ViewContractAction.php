<?php
declare(strict_types=1);

namespace App\Application\Actions\Contract;

use Psr\Http\Message\ResponseInterface as Response;

class ViewContractAction extends ContractAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $contractId = (int) $this->resolveArg('id');
        $contract = $this->contractRepository->findContractOfId($contractId);

        $this->logger->info("Contract of id `${contractId}` was viewed.");

        return $this->respondWithData($contract);
    }
}
