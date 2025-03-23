<?php

$servername ="localhost";
$username ="root";
$userpass ="";
$dbname ="users-data";


$conn= new mysqli($servername,$username,$userpass,$dbname);


if($conn->connect_error){
    die("Connection field bro!".$conn->error);

}


if($_SERVER["REQUEST_METHOD"]== "POST"){
    $useremail=$_POST["email"];
    $userpassword=$_POST["password"];

    $sql = "SELECT * FROM third_users where UserEmail='$useremail' AND UserPassword = '$userpassword'";

    $result = $conn->query($sql);

    if($result->num_rows > 0 ){
        echo "Login succesfull";
    }
    else{
        echo "Inncorect Email Or Password";
    }
}
?>