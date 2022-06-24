<?php

require_once ('ConnectDB.php');

class DBOperations extends Conexao{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserList(){
        $stmt = $this->pdo->prepare("SELECT * FROM Cliente WHERE stats <> 'DELETED' AND Cliente.NOME IS NOT NULL AND Cliente.NOME <> '' ORDER BY idCliente DESC LIMIT 50");
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getUser($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Cliente WHERE idCliente = :idCli AND stats != 'DELETED' ORDER BY idCliente DESC ");
        $stmt->bindParam(':idCli', $id);
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getUserSearch($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Cliente WHERE NOME LIKE :idCli AND stats != 'DELETED' ORDER BY idCliente DESC LIMIT 50");
        $stmt->bindValue(':idCli', '%'.$id.'%');
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getUserOrcs($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento WHERE Cliente = :idCli AND stats != 'DELETED' ORDER BY numOrcamento DESC ");
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
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento WHERE stats <> 'DELETED' ORDER BY numOrcamento DESC");
        try{
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e;
        }
    }

    public function getOrc($id){
        $stmt = $this->pdo->prepare("SELECT * FROM Orcamento WHERE numOrcamento = :numOrc AND stats <> 'DELETED' ORDER BY numOrcamento DESC ");
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
        $stmt = $this->pdo->prepare("SELECT * FROM itensOrcamento WHERE numOrcamento = :numOrc AND stats != 'DELETED' ORDER BY id DESC ");
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
        $stmt = $this->pdo->prepare("SELECT * FROM itensPagamento WHERE numOrcamento = :numOrc AND stats != 'DELETED' ORDER BY id DESC ");
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
