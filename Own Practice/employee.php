<?php
$servername="localhost";
$username="root";
$userpassword ="";
$D_bname ="users-data";


$connection= new mysqli($servername,$username,$userpassword,$D_bname);

if($connection->connect_error){
    die("Connection Failed!".$connection->connect_error);

}

$sql="SELECT * FROM products";

$runkrna=$connection->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        </style>
</head>
<body>
    <h2>Data Fetched Form Data base Through php</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Brand</th>
            <th>Description</th>
            <th>Rating</th>
        </tr>
        <?php
if($runkrna->num_rows > 0 ){
    while($row = $runkrna->fetch_assoc()){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['category']}</td>
            <td>{$row['price']}</td>
            <td>{$row['stock']}</td>
            <td>{$row['brand']}</td>
            <td>{$row['description']}</td>
            <td>{$row['rating']}</td>
        </tr>";
    }
} else {
    echo "No data found";
}


?>

    </table>
</body>
</html>



