<?php
        session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "reviews", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        // take data from add_Product.php

        $id = 0;
        $uname = $_SESSION['username'];
        $prod = $_POST['product_name'];
        $review= $_REQUEST['review'];
        $rating = $_REQUEST['rating'];
        
        $sql = "INSERT INTO reviews VALUES ('$id', '$uname', '$prod', '$review', '$rating')";
        // query
        if(mysqli_query($conn, $sql)){
            header("Location: reviews.php");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

    ?>  