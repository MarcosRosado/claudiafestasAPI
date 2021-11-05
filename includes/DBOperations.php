<?php
require_once 'ConnectDB.php';
class DbOperations {
    private $con;

    function __construct(){
        $db = new DbConnect();
        $this->con = $db->connect();
    }

    function getUserList(){
        $stmt = $this->con->prepare('SELECT * FROM Cliente');
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
