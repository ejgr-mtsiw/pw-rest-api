<?php
declare(strict_types=1);

use App\Application\Actions\Contract\ListContractsAction;
use App\Application\Actions\Contract\ViewContractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/api', function (Group $group) {
        $group->get('/contracts[/groups/{groups:.*}]', ListContractsAction::class);
        $group->get('/contract/{id}', ViewContractAction::class);
    });
};
