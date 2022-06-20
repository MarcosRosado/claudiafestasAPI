<?php

use App\Controllers\AuthController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require_once ('../src/clientes/clientes.php');
require_once ('../src/auth/BasicAuth.php');

require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);

$app->group('', function () use ($app){
    $app->get('/clientes[/{idCli}]', Clientes::class.":getClientes");
    $app->get('/clientes/', Clientes::class.":getAllClientes");
    $app->get('/clientesTest', Clientes::class.":getAllClientes");
})->add(basicAuth());



$app->run();
