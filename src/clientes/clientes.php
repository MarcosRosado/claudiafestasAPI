<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Clientes {
    private $db;
    public function __construct()
    {
        $this->db = new DbOperations();
    }

    function header_log($data){
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        $line = $caller['line'];
        $array = explode('/', $caller['file']);
        $file = array_pop($array);
        header('log_'.$file.'_'.$caller['line'].': '.json_encode($data));
    }

    public function getClientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        if($args['idCli'] != null) {
            $responseData = array();
            $result = $this->db->getUserList();
            $responseData['code'] = 200;
            $responseData['data'] = $result;
            OAuth::class.
            $response->getBody()->write(json_encode($responseData));
            return $response;
        }else{
            return $response;
        }
    }
}