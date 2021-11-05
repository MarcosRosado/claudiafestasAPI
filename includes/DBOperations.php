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
            foreach ($stmt as $row) {
                array_push($data, $row);
            }
            return $data;
        }catch (PDOException $e){
            echo $e;
        }
    }
}
