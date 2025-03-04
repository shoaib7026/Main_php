<?php

session_start();

if(!isset($_SESSION["userid"]) && $_SESSION['role'] != "2"){

    header("location: login.php");
}
else{
    echo"Welcome:" .$_SESSION['name'];
    echo"<br>";
    echo"<br>";

    echo"<br>";

    echo"Your Role Is Admin";
}


?>

<br>
<br>
<a href="logout.php">LogOut</a>