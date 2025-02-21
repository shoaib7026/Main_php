<?php
$servername = "mysql:host=localhost;dbname=shoaib";
$user = "root";
$password = "";


$pdo = new PDO ($servername , $user , $password);

if($pdo){

    echo  " <script> alert('Connected')</script>";
}

?>