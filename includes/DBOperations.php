<?php

require_once ('ConnectDB.php');

class DBOperations extends Conexao{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserList(){
        $stmt = $this->pdo->prepare('SELECT * FROM Cliente');
        $data = [];
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch (PDOException $e){
            echo $e;
        }
    }
}
