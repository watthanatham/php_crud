<?php 
class User {
    private $db;
    function __construct($conn){
        $this->db = $conn;
    }
    function insertUser($username, $password) {
        try {
            $result = $this->getUserByUsername($username);
            if($result["num"]>0) {
                return false;
            }else {
                $new_password = md5($password.$username);
                $sql ="INSERT INTO user(username,password) VALUES(:username,:password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $new_password);
                $stmt->execute();
                return true;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getUserByUsername($username) {
        try {
            $sql = "SELECT COUNT(*) as num FROM user WHERE username=:username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    function getUser($username,$password) {
        try {
            $sql = "SELECT * FROM user WHERE username=:username AND password=:password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
