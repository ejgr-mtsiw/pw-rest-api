<?php
declare(strict_types=1);

use App\Domain\Contract\ContractRepository;
use App\Infrastructure\Persistence\Contract\MysqlContractRepository;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        'db' => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $dbSettings = $settings['db'];
            $capsule = new Manager();

            $capsule->addConnection($dbSettings);
            $capsule->setAsGlobal();
            //$capsule->bootEloquent();

            return $capsule;
        },
        ContractRepository::class => \DI\autowire(MysqlContractRepository::class),
    ]);
};
