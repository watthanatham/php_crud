<?php 
require_once "db/connect.php";

    if(!isset($_GET["id"])) {
        header("Location:index.php");
    }else {
        $id=$_GET["id"];
        $result = $conn->delete($id);
        if($result) {
            header("Location:index.php");
        }
    }
    
?>