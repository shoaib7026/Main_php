<?php
include('components/header.php');
include('php/Addactegro.php');

?>



<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light  justify-content-center ">


                   <form  method="post" enctype="multipart/form-data" style=" width: 500px;">

                   <h3 class="text-center">Add Categories </h3>

                    <div class="form-group">
                      <label for="">Name </label>
                      <input type="text" name="name" id="" class="form-control" placeholder="" value="<?php echo $categoryname;  ?>" aria-describedby="helpId">
                      <small id="helpId" class="text-danger"><?php echo $categorynameerr ?></small>
                    </div><br>

                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" name="description" id="" class="form-control" placeholder="" value="<?php echo  $category_description ;  ?>" aria-describedby="helpId">
                      <small id="helpId" class="text-danger"><?php echo   $category_descriptionerr ?></small>
                    </div><br>

                    <div class="form-group">
                   <label for="">Image</label>
                  <input type="file" name="image" id="" class="form-control" placeholder="" value="<?php echo  $category_image_name; ?>" aria-describedby="helpId">
                  <small id="helpId" class="text-danger"><?php echo  $category_image_nameerr ?></small>
                </div>



                   
                    <div style="text-align: center ; margin-top: 15px;">
        <button class="btn btn-success  " type="submit" name="addcategory">Add Category</button>
    </div>

                   </form>
                </div>
            </div>

            <?php
            
            include('components/footer.php');
            ?>