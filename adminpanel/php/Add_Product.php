<?php
include("A_dbcon.php");
?>

<?php

$productname = $productprice = $productdesc  = $pcategoryid =  $product_Image_name ="";
$productnameerr = $productpriceerr =$productdescerr  = $pcategoryiderr =  $product_Image_nameerr ="";


if(isset($_POST["addproduct"])){
 $productname = $_POST["pname"];
 $productprice = $_POST["pprice"];
$productdesc = $_POST["pdescription"];
 $pcategoryid =  $_POST["cid"] ;
 $product_Image_name =$_FILES['pimage']['name'];
 $product_Image_path =$_FILES['pimage']['tmp_name'];
 $product_Images_folder = "Product_Images/".$product_Image_name;
 $extension = pathinfo($product_Image_name, PATHINFO_EXTENSION);
 $format = ["png","jpeg","jpg"];

//  echo "$pcategoryid";
if(empty($productname)){
    $productnameerr = "Name Kn Lekheyga";
}
if(empty($productprice)){
    $productpriceerr = "Price Bhi Lekho bhai";

}

if(empty($productdesc)){
    $productdescerr = "Bhai Akhri Bar Bol Raha ho description bhi dalo";
}

if(empty($pcategoryid)){
    $pcategoryiderr = " OOO bhai  ";
}
if(empty($product_Image_name)){
    $product_Image_nameerr = "Image bhi Select kro";
}
if (empty($productnameerr) && empty($productpriceerr) && empty($productdescerr) && empty($product_Image_nameerr) && empty($pcategoryiderr) ) {
if(in_array($extension, $format)){
move_uploaded_file($product_Image_path, $product_Images_folder);

$querry = $pdo->prepare("INSERT INTO products (Name , Description , Image , Price , Category_id) VALUES(:cname , :cdes ,:cimg , :cprice , :ccatid )");
$querry->bindParam(":cname", $productname);
$querry->bindParam(":cdes", $productdesc);
$querry->bindParam(":cimg", $product_Image_name);
$querry->bindParam(":cprice", $productprice);
$querry->bindParam(":ccatid", $pcategoryid);

if ($querry->execute()) {
    echo "<script>
        alert('Product Add Successfully!');
        window.location.href='addproduct.php';
    </script>";
    exit();
} else {
    echo "<script>alert('Failed!');</script>";
}

}
else{
    echo "<script>alert('Extension not Allowed!')</script>";
}

}

     
}


?>