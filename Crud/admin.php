<?php

// ab is me dekho ye jo session userid he isko hm yaaha pr access kr pa rahy jbky humne is page pr aesa koi variable nhi banaya ye dosry page pr banaya tha login.php pr but hm isko yaha pr bhi access kr pa rahy he just bcz of session 

session_start();

if(!isset($_SESSION["userid"]) && $_SESSION["role"] != "2") {

    header("location: login.php");
}
else{



    echo"welcome:" .$_SESSION['name'];
    echo"<br>";
    echo"<br>";
    echo"<br>";
echo "Your Role Is Admin";
}




?>
<br>
<br>
<a href="logout.php">LogOut</a>