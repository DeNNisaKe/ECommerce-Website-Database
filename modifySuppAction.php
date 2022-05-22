<?php

session_start();

        require_once('CreateDb.php');
        require_once('component.php');

        $db = new CreateDb("ProductDB", "suppliers", "localhost", "root", "");
        $conn = mysqli_connect("localhost", "root", "", "productdb");

if(isset($_POST['modify'])){
    $id = $_POST['suppId'];
    $name = $_POST['suppName'];
    $type = $_POST['suppType'];
    $phone = $_POST['suppPhone'];
    $email = $_POST['suppEmail'];
    $price = $_POST['suppPrice'];

    $sql = "UPDATE suppliers SET suppName = '$name', suppType = '$type', suppPhone = '$phone', suppEmail = '$email', suppPrice = '$price' WHERE suppId = $id";
    $conn = mysqli_connect("localhost", "root", "", "productdb");
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: Suppliers.php");
    }
}

?>