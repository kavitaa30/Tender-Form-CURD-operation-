<?php
include "config/db.php";

$mobile = $_POST['mobile'];

if (!ctype_digit($mobile)) {
    die("Mobile number must contain only digits");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Text fields
    $type = $_POST['type'];
    $fullName = $_POST['fullName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $license = $_POST['license'];
    $gst = $_POST['gst'];
    $goodsType = $_POST['goodsType'];
    $demand = $_POST['demand'];
    $rate = $_POST['rate'];
    $remarks = $_POST['remarks'];

    // Upload folder
    $uploadDir = "uploads/";

    // File uploads
    $passportPhoto = $_FILES['passportPhoto']['name'];
    $aadhar = $_FILES['aadhar']['name'];
    $pan = $_FILES['pan']['name'];
    $gstCert = $_FILES['gstCert']['name'];
    $licenseCert = $_FILES['licenseCert']['name'];

    move_uploaded_file($_FILES['passportPhoto']['tmp_name'], $uploadDir.$passportPhoto);
    move_uploaded_file($_FILES['aadhar']['tmp_name'], $uploadDir.$aadhar);
    move_uploaded_file($_FILES['pan']['tmp_name'], $uploadDir.$pan);
    move_uploaded_file($_FILES['gstCert']['tmp_name'], $uploadDir.$gstCert);
    move_uploaded_file($_FILES['licenseCert']['tmp_name'], $uploadDir.$licenseCert);

    // Insert query
    $sql = "INSERT INTO tenders 
    (type, fullName, mobile, email, address, state, district, city, license, gst, goodsType, demand, rate, remarks, passportPhoto, aadhar, pan, gstCert, licenseCert)
    VALUES
    ('$type','$fullName','$mobile','$email','$address','$state','$district','$city','$license','$gst','$goodsType','$demand','$rate','$remarks','$passportPhoto','$aadhar','$pan','$gstCert','$licenseCert')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
