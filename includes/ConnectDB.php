<?php
abstract class Conexao
{
    protected $pdo;

    public function __construct()
    {
        // recebe o banco de dados a ser acessado e retorna uma conexão

        include_once dirname(__FILE__) . '/constants.php';
        try {
            $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e;
        }
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}