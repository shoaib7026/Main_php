<?php
include("A_dbcon.php");
?>
<?php
  $categoryname =    $category_description =  $category_image_name ="";
  $categorynameerr =    $category_descriptionerr =  $category_image_nameerr ="";



if(isset($_POST["addcategory"])){
    $categoryname = $_POST["name"];
    $category_description = $_POST["description"];
    $category_image_name= $_FILES['image']['name'];
    $temp_path = $_FILES['image']['tmp_name'];
    $extension = pathinfo($category_image_name, PATHINFO_EXTENSION);
    $destination = "A_Categories_images/" . $category_image_name;
    $format = ["png","jpeg","jpg"];

if(empty($categoryname)){
    $categorynameerr = "Please Enter Name ";
}

if(empty($category_description)){
    $category_descriptionerr = "Please Enter Description ";
}
if(empty($category_image_name)){
    $category_image_nameerr = "Select Image ";
}


if(empty( $category_image_nameerr)&& empty($category_descriptionerr) && empty($category_image_nameerr) ){

    if(in_array($extension, $format)){
        move_uploaded_file($temp_path, $destination);

        $querry= $pdo->prepare("INSERT INTO categories (Name , Description , Images) VALUES (:cname, :cdes , :cimg) ");

        $querry->bindParam(':cname', $categoryname);
        $querry->bindParam(':cdes', $category_description);
        $querry->bindParam(':cimg', $category_image_name);

if($querry->execute()){
    $categoryname =    $category_description =  $category_image_name ="";
}

    }


}



   
}



?>