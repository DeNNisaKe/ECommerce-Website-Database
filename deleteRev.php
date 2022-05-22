<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "reviews", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM reviews WHERE revId = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: adminReviews.php");
            }
        }
?>