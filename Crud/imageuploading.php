<?php
include("dbcon.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image"><br><br>

    <button type="submit" name="sub">Submit</button>
</form>
    
</body>
</html>

<?php


 if(isset($_POST["sub"])){
 
   $filename = $_FILES["image"]["name"];
   $filepath = $_FILES["image"]["tmp_name"];
   $folder = "images/"  ;

   move_uploaded_file($filepath, $folder);



 

   echo "Done";
//  print_r($folder);




 }

?>