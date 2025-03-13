<?php
include("A_dbcon.php");

if(isset($_GET["categoryid"])){
    $urlid = $_GET["categoryid"];

    $query = $pdo->prepare("SELECT * FROM categories WHERE Id = :cid");
    $query->bindParam(":cid", $urlid);
    $query->execute();
    $selected = $query->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['updatecategory'])){
        $name = $_POST['uname'];
        $description = $_POST['udescription'];
        $cid = $_GET['categoryid'];

        
        if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            $image_tmp_path = $_FILES['image']['tmp_name'];
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $destination = "A_Categories_Images/" . $image_name;
            $allowed_extension = ["png", "jpeg", "jpg"];

            if(in_array($extension, $allowed_extension)){
                move_uploaded_file($image_tmp_path, $destination);

                //  Image + Name + Description Update Query
                $updatequery = $pdo->prepare("UPDATE categories SET Name = :cname, Description = :cdes, Image = :cimg WHERE Id = :cid");
                $updatequery->bindParam(":cimg", $image_name);
            } else {
                echo '<script>alert("Invalid image format! Use jpg, jpeg, or png.")</script>';
                exit();
            }
        } else {
           
            $updatequery = $pdo->prepare("UPDATE categories SET Name = :cname, Description = :cdes WHERE Id = :cid");
        }

        $updatequery->bindParam(':cid', $cid);
        $updatequery->bindParam(':cname', $name);
        $updatequery->bindParam(':cdes', $description);

        if($updatequery->execute()){
            echo '<script>alert("Updated Successfully!");
            window.location.href = "addcategory.php";
            </script>';
            exit();
        } else {
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}



//Delete wali querry yaha se shoro he 

if(isset($_GET['cid'])){
    $deleteid = $_GET['cid'];

    $delete_querry = $pdo->prepare('DELETE FROM categories Where Id = :cid');
    $delete_querry->bindParam(':cid', $deleteid);
    $delete_querry->execute();  
    
    echo  " <script> alert('Category Deleted'); window.location.href='viewcategory.php'; </script>";
}


?>