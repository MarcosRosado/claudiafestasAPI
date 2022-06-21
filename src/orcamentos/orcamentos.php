<?php

require_once ('../includes/DBOperations.php');

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Orcamentos extends DbOperations {

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

    function getOrcamento(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if(sizeof($args) > 0) {
            if ($args['idOrc'] != null) {
                $responseData = array();
                $result = $this->getOrc($args['idOrc']);
                if(sizeof($result) > 0) {
                    $responseData['data'] = $result;
                    $response->getBody()->write(json_encode($responseData));
                    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
                }
                else{
                    return $response->withStatus(204);
                }
            } else {
                return $response->withStatus(404);
            }
        }
        return $response->withStatus(400);
    }

    function getItensOrcamento(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if(sizeof($args) > 0) {
            if ($args['idOrc'] != null) {
                $responseData = array();
                $result = $this->getItensOrc($args['idOrc']);
                if(sizeof($result) > 0) {
                    $responseData['data'] = $result;
                    $response->getBody()->write(json_encode($responseData));
                    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
                }
                else{
                    return $response->withStatus(204);
                }
            } else {
                return $response->withStatus(404);
            }
        }
        return $response->withStatus(400);
    }

    function getPagamentosOrcamento(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if(sizeof($args) > 0) {
            if ($args['idOrc'] != null) {
                $responseData = array();
                $result = $this->getPagamentosOrc($args['idOrc']);
                if(sizeof($result) > 0) {
                    $responseData['data'] = $result;
                    $response->getBody()->write(json_encode($responseData));
                    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
                }
                else{
                    return $response->withStatus(204);
                }
            } else {
                return $response->withStatus(404);
            }
        }
        return $response->withStatus(400);
    }

    function getAllOrcamentos(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $responseData = array();
        $result = $this->getAllOrcs();
        $responseData['data'] = $result;
        $response->getBody()->write(json_encode($responseData));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}