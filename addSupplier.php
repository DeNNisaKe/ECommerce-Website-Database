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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once("adminHeader.php"); ?>

    <!-- form to modify data for order-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add supplier</h1>
                <form action="addSupplierAction.php" method="post">
                    <div class="form-group">
                        <label for="order_id">Name</label>
                        <input type="text" class="form-control" name="suppName" id="suppName" placeholder="Enter supplier's name">
                    </div>
                    <div class="form-group">
                        <label for="product_id">Delivered products</label>
                        <input type="text" class="form-control" name="suppType" id="suppType" placeholder="Enter type of products">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Phone</label>
                        <input type="text" class="form-control" name="suppPhone" id="suppPhone" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="price">Email</label>
                        <input type="text" class="form-control" name="suppEmail" id="suppEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="order_status">Total Price</label>
                        <input type="text" class="form-control" name="suppPrice" id="suppPrice" placeholder="Enter total price">
                    </div>
                    <button type="submit" class="btn btn-primary" name="modify">Submit</button>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>