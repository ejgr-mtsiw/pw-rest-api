<?php
declare(strict_types=1);

namespace App\Application\Actions\Contract;

use Psr\Http\Message\ResponseInterface as Response;

class ListContractsAction extends ContractAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $contracts = $this->contractRepository->findAll();

        $this->logger->info("Contracts list was viewed.");

        return $this->respondWithData($contracts);
    }
}
