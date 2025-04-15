<?php
include("php/connection.php");
unset($_SESSION['useremail']);
echo "<script>location.assign('index.php')</script>"; 
?>