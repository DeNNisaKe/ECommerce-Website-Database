<?php

// start session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once('CreateDb.php');
require_once('component.php');

// create instance of CreateDb class
$database = new CreateDb("ProductDB", "products", "localhost", "root", "");

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){     
        // putting item in cart
        $item_array_id = array_column($_SESSION['cart'], 'product_id');
        print_r($item_array_id);

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
            
        }
    }else{
        $item_array = array(
            'product_id'=> $_POST['product_id']
        );
        // create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once("header.php"); ?>

    <!-- thank you for ordering from us, here is your order -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Thank you for ordering from us</h1>
                <h3>Here is your order</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "productdb");
                            if(!empty($_SESSION['cart'])){
                                $total = 0;
                                foreach($_SESSION['cart'] as $key => $value){
                                    $product_id = $value['product_id'];
                                    $sql = "SELECT * FROM products WHERE id = $product_id";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $subtotal = $row['price'];
                                    $total += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo "1"; ?></td>        <!-- edit -->
                                        <td><?php echo $subtotal; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            
                            <td colspan="3" class="text-right">Total</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>