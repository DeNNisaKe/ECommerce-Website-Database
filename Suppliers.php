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
                    <h1>Suppliers</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delivered Products</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Total Price Asked</th>
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
                        $database = new CreateDb("ProductDB", "suppliers", "localhost", "root", "");

                        // get data from database
                        $sql = "SELECT * FROM suppliers";
                        $conn = mysqli_connect("localhost", "root", "", "productdb");
                        $result = mysqli_query($conn, $sql);

                        // loop through data
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['suppId']."</td>";
                            echo "<td>".$row['suppName']."</td>";
                            echo "<td>".$row['suppType']."</td>";
                            echo "<td>".$row['suppPhone']."</td>";
                            echo "<td>".$row['suppEmail']."</td>";
                            echo "<td>".$row['suppPrice']."</td>";
                            echo "</tr>";
                        }

                            ?>
                        </tbody>
                    </table>
                

                <form action="addSupplier.php" method ="post">
                    <div class="form-group">
                        <input type="button" class="btn btn-primary" value="Add Supplier" onclick="window.location.href='addSupplier.php'">
                    </div>
                    </form>
                </form>
                <form action="delete_supplier.php" method="post">
                    <div class="form-group">
                        <label for="id">Supplier ID</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <button type="submit" value="delete" class="btn btn-primary" name="delete">Delete</button>
                </div>
            </div>
            <!-- modify order button -->
            <div class="row">
                <div class="col-md-12">
                    <a href="modify_supp.php" class="btn btn-primary">Modify Supplier</a>
                </div>
            </div>  
</body>
</html>