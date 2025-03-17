<?php

include("A_dbcon.php");
?>

<?php
if(isset($_GET["productid"])){
    $productid = $_GET['productid'];

    
    $querry = $pdo->prepare("
        SELECT products.*, categories.Name AS category_name 
        FROM products 
        INNER JOIN categories ON products.Category_Id = categories.id
        WHERE products.Id = :pid
    ");
    
    $querry->bindParam(':pid', $productid);
    $querry->execute();
    $selectedProduct = $querry->fetch(PDO::FETCH_ASSOC);

    // print_r($selectedProduct); 
    $updname =    $updprice =    $upddescription =   $updcategory = "";
    $updnameerr =    $updpriceerr =    $upddescriptionerr =   $updcategoryerr = "";

  if(isset($_POST['updateproduct'])){
    $updname = $_POST['updname'];
    $updprice = $_POST['updprice'];
    $upddescription = $_POST['upddescription'];
    $updcategory = $_POST['updcid'];
    $selectedproductid = $_GET['productid'];

    if(empty($updname)){
        $updnameerr  = "Enter Name Please ";
    }
    if(empty($updprice)){
        $updpriceerr = "Enter Price Please";
    }
    if(empty($upddescription)){
        $upddescriptionerr = " Enter Description";
    }
    if(empty($updcategory)){
        $updcategoryerr = "Select Category From Here ";
    }
if(empty($updnameerr) && empty($updpriceerr) && empty($upddescriptionerr) && empty($updcategoryerr)){

$newimage = $_FILES['updimage']['name'];
$newimgpath = $_FILES['updimage']['tmp_name'];

if(!empty($newimage)){
    $imagefolder = "Product_images/".$newimage;


    $puraniimage = "Product_images/". $selectedProduct['Image'];
    if(file_exists($puraniimage)){
        unlink($puraniimage);
    }
    move_uploaded_file($newimgpath , $imagefolder);
}
else{
    $newimage = $selectedProduct['Image'];
}

    $updatequery = $pdo->prepare("UPDATE products SET Name = :uname , Price = :uprice, Description =  :udes, Category_Id = :ucid, Image = :updimg  WHERE id = :pid ");
    $updatequery->bindParam(':uname' , $updname);
    $updatequery->bindParam(':uprice', $updprice);
    $updatequery->bindParam(':udes',$upddescription);
    $updatequery->bindParam(':ucid' , $updcategory);
    $updatequery->bindParam(':pid', $selectedproductid);
    $updatequery->bindParam(':updimg', $newimage);

   if( $updatequery->execute()){
    echo  " <script>
    
    alert( 'Product Update Successfully!');
    window.location.href= 'viewproduct.php';
    </script>;";
   }
   else {
    echo '<script>alert("Update Failed!")</script>';
}



}



  }



}
if(isset($_GET["pid"])){
    $deleteid = $_GET['pid'];
   
    $querry = $pdo->prepare("DELETE FROM products WHERE id = :did");
    $querry->bindParam(':did',$deleteid);

    if($querry->execute()){
        echo "<script>
    
            alert('Product deleted successfully!');
            window.location.href = 'viewproduct.php';
    
    </script>";
    
    }

  }
?>



