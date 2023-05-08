<?php

$host="localhost";
$username="root";
$password="";
$db="employeesdb";

$dsn="mysql:host=$host;dbname=$db;charset=utf8";

try{
    $pdo = new PDO($dsn, $username, $password);
    // echo "Db Connected";
}catch(PDOException $e) {
    echo $e->getMessage();
}
require_once "db/controller.php";
require_once "db/user.php";
$conn = new Controller($pdo);
$user = new User($pdo);

// $user->insertUser('watt', 'watt12345');

?>