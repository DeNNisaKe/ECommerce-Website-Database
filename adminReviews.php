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
$database = new CreateDb("ProductDB", "reviews", "localhost", "root", "");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once("adminHeader.php"); ?>
    
<!-- boxes to display user and his comment -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Reviews</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Comment</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    // get all reviews from database
                                    $sql = "SELECT * FROM reviews";
                                    $conn = mysqli_connect("localhost", "root", "", "productdb");
                                    $result = mysqli_query($conn, $sql);

                                    if($result->num_rows > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>".$row['revId']."</td>";
                                        echo "<td>".$row['usrName']."</td>";
                                        echo "<td>".$row['prod_name']."</td>";
                                        echo "<td>".$row['comment']."</td>";
                                        echo "<td>".$row['rating']."</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <!-- form and buttons to delete a review -->
                            <form action="deleteRev.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" id="id" placeholder="Enter id">
                                </div>
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>