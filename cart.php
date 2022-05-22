<?php
session_start();

require_once('CreateDb.php');
require_once('component.php');

$db = new CreateDb("ProductDB", "products", "localhost", "root", "");

if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once('header.php');
?>
    
<div class="container-fluid">
    <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h4>My Cart</h4>
                    <hr>
                <?php
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
                ?>
                 </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h4>PRICE DETAILS</h4>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<h6>Price ($count item/s)</h6>";
                        }else{
                            echo "<h6>Price (0 items)</h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h4>Payable amount</h4>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h4>$<?php echo $total; ?></h4>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <!-- form to take user data for finishing order -->
                <form action="success.php" method="post">
                    <!-- user label + user textfield -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    <!-- address label + address textfield -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                        <!-- phone number -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                            <!-- drop down list with payment method -->
                            <div class="form-group">
                                <label for="payment">Payment Method</label>
                                <select class="form-control" id="payment" name="payment">
                                    <option value="Cash">Cash</option>
                                    <option value="Card">Card</option>
                                </select>
                    </div>
                    <div class="cartButtons">
                    <input type="submit" class="btn btn-success" name="finish" value="Finish Order">
                    <input type="reset" class="btn btn-danger" name="cancel" value="Reset">
                    </div>
                </form>
            </div>
            
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>