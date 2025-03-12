<?php
include('components/header.php');
include('php/Edit-Category.php');
?>




<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light  justify-content-center ">


                   <form  method="post" enctype="multipart/form-data" style=" width: 500px;">

                   <h3 class="text-center">Edit Data From Here </h3>

                    <div class="form-group">
                      <label for="">Name </label>
                      <input type="text" name="uname" id="" class="form-control" placeholder="" value="<?php echo $selected['Name']; ?>" aria-describedby="helpId">
                    </div><br>

                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" name="udescription" id="" class="form-control" placeholder="" value="<?php echo $selected['Description']; ?>" aria-describedby="helpId">
                    </div><br>

                    <div class="form-group">
                   <label for="">Image</label>
                  <input type="file" name="image" id="" class="form-control" placeholder=""  aria-describedby="helpId">
                  <img src="A_Categories_images/<?php echo $selected['Image']; ?>" height="100px" alt="">
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