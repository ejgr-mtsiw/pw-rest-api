<?php
declare(strict_types=1);

namespace App\Domain\Contract;

use App\Domain\DomainException\DomainRecordNotFoundException;

class DuplicateContractIdException extends DomainRecordNotFoundException
{
    public $message = 'Duplicate entry for contract id.';
}
