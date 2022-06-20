<?php

require_once ('../includes/DBOperations.php');

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Clientes extends DbOperations {

    public function __construct()
    {
        parent::__construct();
    }

    function header_log($data){
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        $line = $caller['line'];
        $array = explode('/', $caller['file']);
        $file = array_pop($array);
        header('log_'.$file.'_'.$caller['line'].': '.json_encode($data));
    }

    function getClientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if($args['idCli'] != null) {
            $responseData = array();
            $result = $this->getUserList();
            $responseData['code'] = 200;
            $responseData['data'] = $result;
            OAuth::class.
            $response->getBody()->write(json_encode($responseData));
            return $response;
        }else{
            return $response;
        }
    }

    function getAllClientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $responseData = array();
        $result = $this->getUserList();
        $responseData['code'] = 200;
        $responseData['data'] = $result;
        OAuth::class.
        $response->getBody()->write(json_encode($responseData));
        return $response;
    }
}