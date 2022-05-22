<?php
        session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "suppliers", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

        // take data from add_Product.php
        $name = $_REQUEST['suppName'];
        $type = $_REQUEST['suppType'];
        $phone = $_REQUEST['suppPhone'];
        $email = $_REQUEST['suppEmail'];
        $price = $_REQUEST['suppPrice'];
        

        $sql = "INSERT INTO suppliers VALUES ('$id','$name', '$type', '$phone', '$email', '$price')";
        // query
        if(mysqli_query($conn, $sql)){
            header("Location: Suppliers.php");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

    ?>  