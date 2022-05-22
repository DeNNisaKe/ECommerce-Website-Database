<?php
        session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "products", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        // take data from add_Product.php
        $type = $_REQUEST['product_type'];
        $name = $_REQUEST['product_name'];
        $price = $_REQUEST['product_price'];
        $image = $_REQUEST['filename'];

        $sql = "INSERT INTO products VALUES ('$id','$type', '$name', '$price', '/Proj/photos/$image')";
        // query
        if(mysqli_query($conn, $sql)){
            header("Location: adminIndex.php");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

    ?>  