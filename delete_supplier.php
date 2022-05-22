<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "suppliers", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM suppliers WHERE suppId = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: Suppliers.php");
            }
        }
?>