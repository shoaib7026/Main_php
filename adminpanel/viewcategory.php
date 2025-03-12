<?php
include("components/header.php");
include("php/A_dbcon.php");
?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded  p-4">
                <h4 class="mb-4 text-center">Catgeory table</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th> Name</th>
                            <th> Description</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $querry = $pdo->query("SELECT * From categories");
                        $allcategories = $querry->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($allcategories as $category) {
                            ?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td><?php echo $category['Name']; ?></td>
                                <td><?php echo $category['Description'];?></td>
                                <td><img height="100px" src="A_Categories_Images/<?php echo $category['Image']; ?>" alt="Image"></td>

                                <td><a class="btn btn-info" href="editcategory.php?categoryid=<?php echo $category['id']; ?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="editcategory.php?cid=<?php echo $category['id']; ?>">Delete</a></td>
                            </tr>

                            <?php
                        }

                        ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include("components/footer.php");
?>