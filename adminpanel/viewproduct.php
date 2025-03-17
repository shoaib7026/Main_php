<?php
include("php/A_dbcon.php");

include("components/header.php");
?>



<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded  p-4">
                <h4 class="mb-4 text-center">Producuts table</h4>
                <table class="table" style="border: 1px solid black;">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th> Name</th>
                            <th> Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Category Id</th>
                            <th>Action</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $querry = $pdo->query("SELECT * FROM products");
                       $products = $querry->fetchAll(PDO::FETCH_ASSOC);

                    //    print_r($products);

                       foreach($products as $product){

                       ?>
                       <tr>
                        <td><?php echo$product['id']; ?></td>
                        <td><?php echo$product['Name']; ?></td>
                        <td><?php echo$product['Description']; ?></td>
                        <td><img height="100px" src="Product_Images/<?php echo $product['Image']; ?>" alt=""></td>
                        <td><?php echo$product['Price']; ?></td>
                        <td><?php echo$product['Category_Id']; ?></td>
                        <td><a class="btn btn-info" href="editproduct.php?productid=<?php echo $product['id']; ?>">Update</a></td>
                        <td><a class="btn btn-danger" href="editproduct.php?pid= <?php echo $product['id']; ?> ">Delete</a></td>
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