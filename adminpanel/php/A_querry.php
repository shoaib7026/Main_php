<?php
include("A_dbcon.php");

?>

<?php


 $name  =  $description =   $image = "";
 $nameerr  =  $descriptionerr =   $imageerr = "";


 if (isset($_POST["addcategory"])){
   $name = $_POST['name'];
   $description = $_POST['description'];
   $image = $_FILES['image']['name'];
   $temppath = $_FILES['image']['tmp_name'];
   $folder = "categoriesimages/" . $image ;

if(empty($name)){
    $nameerr = "Enter Your Name Admin Sahb ";
}
if(empty($description)){
    
    $descriptionerr = "Enter Description ";
}
if(empty($image)){
    $imageerr = "Image bhi to Select kro Admin Sahb";
}

if(empty($nameerr) && empty($descriptionerr) && empty($imageerr) ){
    move_uploaded_file($temppath, $folder);

    $querry = $pdo->prepare("INSERT INTO admincategoriesdata (Name , Description , Images) VALUES(:uname, :udes ,:img)");
    $querry->bindParam(":uname", $name);
    $querry->bindParam(":udes",   $description );
    $querry->bindParam(":img", $image);

    if($querry->execute()){
 $name  =  $description =   $image = "";

    }

    
    
}



 }


?>