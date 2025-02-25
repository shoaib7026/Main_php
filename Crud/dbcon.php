<?php
$server = "mysql:host=localhost;dbname=Registration";
$user = "root";
$pass = "";

$conn = new Pdo($server , $user , $pass);

// if($conn){
//     echo "<script> alert('Connection Succesful')</script>";
// }
// else{

// echo "Connection failed " . $conn->errorInfo();
// }



?>