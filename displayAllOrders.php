<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php require_once("adminHeader.php"); ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Order History</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone number</th>
                                <th>Payment Method</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        session_start();

                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                         header("location: login.php");
                         exit;
                        }

                        require_once('CreateDb.php');
                        require_once('component.php');

                        // create instance of CreateDb class
                        $database = new CreateDb("ProductDB", "products", "localhost", "root", "");

                                $sql = "SELECT * FROM orders";
                                $conn = mysqli_connect("localhost", "root", "", "productdb");
                                $result = mysqli_query($conn, $sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>".$row['orderid']."</td>";
                                        echo "<td>".$row['userName']."</td>";
                                        echo "<td>".$row['userAddress']."</td>";
                                        echo "<td>".$row['userPhone']."</td>";
                                        echo "<td>".$row['userMethod']."</td>";
                                        echo "<td>".$row['totalPrice']."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    
                <form action="delete_order.php" method="post">
                    <div class="form-group">
                        <label for="id">Order ID</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <button type="submit" value="delete" class="btn btn-primary" name="delete">Delete</button>
                </div>
            </div>
            <!-- modify order button -->
            <div class="row">
                <div class="col-md-12">
                    <a href="modify_order.php" class="btn btn-primary">Modify Order</a>
                </div>
            </div>  
</body>
</html>