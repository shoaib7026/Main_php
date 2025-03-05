<?php
include('components/header.php');
include('php/A_querry.php');


?>


   <!-- Blank Start -->
   <div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded  justify-content-center mx-0">
                    <div class="col-md-12 ">
                       <table class="table">
                        <thead>
                            <tr>
                                <th>Catgeory Id</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $querry = $pdo->query("SELECT * FROM admincategoriesdata");
                            $allcategories = $querry->fetchAll(PDO::FETCH_ASSOC);
                            // print_r($allcategories);

                            

                            ?>

<?php foreach($allcategories as $category){   ?>                            
                            <tr>
                                <td><?php echo $category['id'];  ?></td>
                                <td><?php echo $category['Name'];  ?></td>
                                <td><?php echo $category['Description'];  ?></td>
                                <td><img height="100px " src="categoriesimages/<?php echo $category['Images'];?>"></td>
                                <td><a class="btn btn-info" href="editcategory.php?categoryid=<?php echo $category['id']; ?> ">Edit</a></td>
                                <td><a class="btn btn-danger" href="">Delete</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->









            <?php
            
            include('components/footer.php');
            ?>