<?php
include('components/header.php');
include('php/A_querry.php');


?>


   <!-- Blank Start -->
   <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                       <table class="table">
                        <thead>
                            <tr>
                                <th>Catgeory Id</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $querry = $pdo->query("SELECT * FROM admincategoriesdata");
                            $allcategories = $querry->fetchALL(PDO::FETCH_ASSOC);

                            
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->









            <?php
            
            include('components/footer.php');
            ?>