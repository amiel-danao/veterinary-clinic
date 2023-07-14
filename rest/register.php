<?php
session_start();
date_default_timezone_set("Asia/Manila");
$userEmail = $_POST['customerDetailsCustomerEmail'];
$con = mysqli_connect("localhost", "inventoryUser", "password", "shop_inventory");
$result = $con->query("SELECT email FROM `customer` WHERE email = '$userEmail'");
if($result->num_rows == 0){
    $userFullName = $_POST['customerDetailsCustomerFullName'];
    $userPhone1 = $_POST['customerDetailsCustomerMobile'];
    $userPhone2 = $_POST['customerDetailsCustomerPhone2'];
    $userPassword = password_hash($_POST['customerDetailsPassword'], PASSWORD_BCRYPT);
    $userAddress1 = $_POST['customerDetailsCustomerAddress'];
    $userAddress2 = $_POST['customerDetailsCustomerAddress2'];
    $userCity = $_POST['customerDetailsCustomerCity'];
    $userDistrict = $_POST['customerDetailsCustomerDistrict'];
    $userCreatedOn = date("Y-m-d H:i:s");
    $userStatus = "Active";
    $conStatus = $con->query("INSERT INTO customer (fullName, email, mobile, phone2, address, address2, city, district, createdOn, password)
                VALUES ('$userFullName', '$userEmail', '$userPhone1', '$userPhone2', '$userAddress1', '$userAddress2', '$userCity', '$userDistrict', '$userCreatedOn', '$userPassword')");
    if($conStatus == true){
        header("Location: http://localhost/veterinary-clinic/login.php");
        die();
    }
} else {
    $_SESSION['errorMessage'] = "Email already taken!";
    header("Location: http://localhost/veterinary-clinic/login.php?action=register");
    die();
}
echo "Done";
$con->close();

