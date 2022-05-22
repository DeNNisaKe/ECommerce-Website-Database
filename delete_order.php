<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "orders", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM orders WHERE orderid = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: displayAllOrders.php");
            }
        }
?>