<?php

use App\Controllers\AuthController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require_once ('../src/clientes/clientes.php');
require_once ('../src/orcamentos/orcamentos.php');
require_once ('../src/auth/BasicAuth.php');

require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);


$app->group('/clientes/{idCli}', function (RouteCollectorProxy $group){
    $group->get('', Clientes::class.":getCliente");
    $group->get('/orcamentos[/]', Clientes::class.":getClienteOrcs");
})->add(basicAuth());

$app->group('/orcamentos/{idOrc}', function (RouteCollectorProxy $group){
    $group->get('', Orcamentos::class.":getOrcamento");
    $group->get('/itens[/]', Orcamentos::class.":getItensOrcamento");
    $group->get('/pagamentos[/]', Orcamentos::class.":getPagamentosOrcamento");
})->add(basicAuth());

$app->group('', function (RouteCollectorProxy $group){
    $group->get('/allClientes[/]', Clientes::class.":getAllClientes");
    $group->get('/allOrcamentos[/]', Orcamentos::class.":getAllOrcamentos");
})->add(basicAuth());


$app->run();
