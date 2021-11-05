<?php
class DbConnect
{
    private $con;

    function __construct()
    {
    }

    // recebe o banco de dados a ser acessado e retorna uma conexão
    function connect()
    {
        include_once dirname(__FILE__) . '/constants.php';
        try {
            $this->con = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e;
        }
        return $this->con;

    }
}