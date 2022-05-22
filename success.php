<?php
            session_start();

            require_once('CreateDb.php');
            require_once('component.php');

               $db = new CreateDb("ProductDB", "products", "localhost", "root", "");
               $total = 0;
               $conn = mysqli_connect("localhost", "root", "", "productdb");
               if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                $result = $db->getData();
                while($row = mysqli_fetch_assoc($result)){
                    foreach($product_id as $id){
                        if($row['id'] == $id){
                            cartElement($row['image'], $row['name'], $row['price'], $row['id'], $id);
                            $total = $total + (int)$row['price']; 
                    }
                }
                }
               }else{
                   echo "<h5>Cart is empty</h5>";
               }

        $conn = mysqli_connect("localhost", "root", "", "productdb");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $id = '0';
        $name =  $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $phone =  $_REQUEST['phone'];
        $payment = $_REQUEST['payment'];
        $tott = $total;
        
        $sql = "INSERT INTO orders VALUES ('$id', '$name', '$address', '$phone', '$payment', '$tott')";
         
        if(mysqli_query($conn, $sql)){
            header("Location: afterCheckout.php");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>