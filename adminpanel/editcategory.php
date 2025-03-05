<?php
include('components/header.php');
include('php/A_querry.php');

?>

<?php
if(isset($_GET['categoryid'])){
    $urlcatid = $_GET['categoryid'];

    $querry = $pdo->prepare('SELECT * FROM admincategoriesdata WHERE id = :catid');



    $querry->bindParam(':catid', $urlcatid);

    $querry->execute();

    $selectedcategory = $querry->fetch(PDO::FETCH_ASSOC);

    // print_r($selectedcategory);

}
?>

<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light  justify-content-center ">


                   <form  method="post" enctype="multipart/form-data" style=" width: 500px;">

                   <h3 class="text-center">Edit Data From Here </h3>

                    <div class="form-group">
                      <label for="">Name </label>
                      <input type="text" name="name" id="" class="form-control" placeholder="" value="<?php echo $selectedcategory['Name'];  ?>" aria-describedby="helpId">
                    </div><br>

                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" name="description" id="" class="form-control" placeholder="" value="<?php echo $selectedcategory['Description'] ;  ?>" aria-describedby="helpId">
                    </div><br>

                    <div class="form-group">
                   <label for="">Image</label>
                  <input type="file" name="image" id="" class="form-control" placeholder=""  aria-describedby="helpId">
                  <img src="categoriesimages/<?php echo $selectedcategory['Images']; ?>" height="100px" alt="">
                </div>



                   
                    <div style="text-align: center ; margin-top: 15px;">
        <button class="btn btn-success  " type="submit" name="updatecategory">Update</button>
    </div>

                   </form>
                </div>
            </div>

            <?php
            
            include('components/footer.php');
            ?>