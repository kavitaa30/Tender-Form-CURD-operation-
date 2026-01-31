<?php
include "config/db.php";

$mobile = $_POST['mobile'];

if (!ctype_digit($mobile)) {
    die("Mobile number must contain only digits");
}


$id = $_POST['id'];  


$fullName = $_POST['fullName'];    
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$goodsType = $_POST['goodsType'];


mysqli_query($conn, "
    UPDATE tenders SET 
        fullName='$fullName', 
        mobile='$mobile', 
        email='$email', 
        goodsType='$goodsType'
    WHERE id=$id
");

header("Location: list.php");
exit;
