<?php
declare(strict_types=1);

use App\Domain\Contract\ContractRepository;
use App\Infrastructure\Persistence\Contract\InMemoryContractRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        ContractRepository::class => \DI\autowire(InMemoryContractRepository::class),
    ]);
};
