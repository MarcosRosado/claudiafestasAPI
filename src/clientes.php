<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Clientes {
    private $db;
    public function __construct()
    {
        $this->db = new DbOperations();
    }

    public function getClientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if($args['idCli'] == null) {
            $responseData = array();
            $result = $this->db->getUserList();
            $responseData['error'] = false;
            $responseData['response'] = $result;
            $response->getBody()->write(json_encode($responseData));
            return $response;
        }else{
            return $response;
        }
    }
}