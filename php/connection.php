<?php
$server = "mysql:host=localhost;dbname=Registration";
$user = "root";
$pass = "";

$pdo = new Pdo($server , $user , $pass);

// if($pdo){
//     echo "<script> alert('Connection Succesful')</script>";
// }
// else{

// echo "Connection failed " . $pdo->errorInfo();
// }



?>