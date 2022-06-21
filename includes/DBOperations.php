<?php

require_once ('ConnectDB.php');

class DBOperations extends Conexao{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserList(){
        $stmt = $this->pdo->prepare('SELECT * FROM Cliente');
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getUser($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Cliente WHERE idCliente = :idCli AND stats != 'DELETED' ");
        $stmt->bindParam(':idCli', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getUserOrcs($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento WHERE Cliente = :idCli AND stats != 'DELETED' ");
        $stmt->bindParam(':idCli', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getAllOrcs(){
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento");
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getOrc($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento WHERE numOrcamento = :numOrc ");
        $stmt->bindParam(':numOrc', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getItensOrc($id){
        $stmt = $this->pdo->prepare("SELECT * FROM itensOrcamento WHERE numOrcamento = :numOrc AND stats != 'DELETED' ");
        $stmt->bindParam(':numOrc', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getPagamentosOrc($id){
        $stmt = $this->pdo->prepare("SELECT * FROM itensPagamento WHERE numOrcamento = :numOrc AND stats != 'DELETED' ");
        $stmt->bindParam(':numOrc', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }
}
