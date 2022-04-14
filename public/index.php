<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require_once ('../src/clientes/clientes.php');
require_once '../includes/DBOperations.php';
require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);


$app->get('/clientes[/{idCli}]', Clientes::class.":getClientes");

$app->run();
