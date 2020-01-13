<?php
declare(strict_types=1);

namespace App\Application\Actions\Contract;

use App\Application\Actions\Action;
use App\Domain\Contract\ContractRepository;
use Psr\Log\LoggerInterface;

abstract class ContractAction extends Action
{
    /**
     * @var ContractRepository
     */
    protected $contractRepository;

    /**
     * @param LoggerInterface $logger
     * @param ContractRepository  $contractRepository
     */
    public function __construct(LoggerInterface $logger, ContractRepository $contractRepository)
    {
        parent::__construct($logger);
        $this->contractRepository = $contractRepository;
    }
}
