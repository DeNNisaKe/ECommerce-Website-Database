<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "products", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        // take data from add_Product.php
        $id = $_REQUEST['product_id'];
        $name = $_REQUEST['product_name'];

        // delete product based on name and id
        $sql = "DELETE FROM products WHERE id = '$id' AND name = '$name'";
        // query
        if(mysqli_query($conn, $sql)){
            header("Location: adminIndex.php");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

?>