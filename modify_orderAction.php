<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "orders", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

if(isset($_POST['modify'])){
    $id = $_POST['ord_id'];
    $name = $_POST['ord_username'];
    $address = $_POST['ord_address'];
    $phone = $_POST['ord_phone'];
    $method = $_POST['ord_method'];
    $price = $_POST['ord_price'];

    $sql = "UPDATE orders SET userName = '$name', userAddress = '$address', userPhone = '$phone', userMethod = '$method', totalPrice = '$price' WHERE orderid = $id";
    $conn = mysqli_connect("localhost", "root", "", "productdb");
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: displayAllOrders.php");
    }
}

?>