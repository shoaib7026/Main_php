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
    $Uname=$_POST["username"];
    $Uemial =$_POST["email"];
    $Upassword =$_POST["password"];

$sql = "INSERT INTO third_users (UserName,UserEmail,UserPassword) VALUES('$Uname','$Uemial','$Upassword')";

if($conn->query(query: $sql) === TRUE){
    echo "New User Succesfully Add To Data_Base";
}
else{
    echo "Error";
}

}

?>