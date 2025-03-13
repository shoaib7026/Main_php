<?php
include('components/header.php');
include('php/Edit-Product.php');
?>

<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light  justify-content-center ">


        <form method="post" enctype="multipart/form-data" style=" width: 500px;">

            <h3 class="text-center">Add Products </h3>

            <div class="form-group">
                <label for="">Name </label>
                <input type="text" name="pname" id="" class="form-control" value="<?php echo $selectedProduct['Name']; ?> " placeholder="" aria-describedby="helpId">
                <!-- <small id="helpId" class="text-danger"><?php echo $productnameerr ?></small> -->
            </div><br>
            <div class="form-group">
                <label for="">Price </label>
                <input type="number" name="pprice" id="" class="form-control" value="<?php echo $selectedProduct['Price']; ?>" placeholder="" aria-describedby="helpId">
                <!-- <small id="helpId" class="text-danger"><?php echo $productpriceerr ?></small> -->
            </div><br>

            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="pdescription" id=""  class="form-control" value="<?php echo $selectedProduct['Description']; ?> placeholder="" aria-describedby="helpId">
                <!-- <small id="helpId" class="text-danger"><?php echo $productdescerr  ?></small> -->
            </div><br>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="pimage" id="" class="form-control"  placeholder="" aria-describedby="helpId">
                <img height="100px" src="Product_images/<?php echo $selectedProduct['Image']; ?>" alt="">
            </div><br>

            <div class="form-group">
           
                <select name="cid" id="" class="form-control"  aria-describedby="helpId"  >
                    <option value="">Select Category  </option>
                    <?php
                    $querry = $pdo->query('SELECT * FROM categories');
                    $categories = $querry->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $category) {
                    ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['Name']; ?></option>
                  <?php
                    }
                  ?>

                </select>
                <!-- <small id="helpId" class="text-danger"><?php echo $pcategoryiderr ?></small> -->


            </div>

            <div style="text-align: center ; margin-top: 15px;">
                <button class="btn btn-success  " type="submit" name="updateproduct">Add Category</button>
            </div>

        </form>
    </div>
</div>





            <?php
            
            include('components/footer.php');
            ?>