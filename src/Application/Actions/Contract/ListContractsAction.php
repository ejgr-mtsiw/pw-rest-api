<?php
declare(strict_types=1);

namespace App\Application\Actions\Contract;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class ListContractsAction extends ContractAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        try {
            $groups = explode('/', $this->resolveArg('groups'));
        } catch (HttpBadRequestException $ex) {
            $groups = [];
        }

        if (empty($groups)) {
            $contracts = $this->contractRepository->findAll();
        } else {
            $contracts = $this->contractRepository->findAllByGroupId($groups);
        }

        $this->logger->info("Contracts list was viewed.");

        return $this->respondWithData($contracts);
    }
}
