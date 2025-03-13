<?php

include("A_dbcon.php");
?>

<?php
if(isset($_GET["productid"])){
    $productid = $_GET['productid'];

    $querry = $pdo->prepare("SELECT * FROM products WHERE Id = :pid");
    $querry->bindParam(':pid', $productid);
        $querry->execute();
        $selectedProduct = $querry->fetch(PDO::FETCH_ASSOC);

        // print_r($selectedProduct);

}

?>


