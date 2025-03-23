<?php
// ye jo mena lekha he ye basically multidimensional array hi he because aeyk array k andr 3 array he to ye nested hi ho gaya  or jb jb array me aeyk hi product ho to wo associative array hi khelata he 
$products = [

    [
    "P_id" => 1,
    "name"=> "Watch Ultra",
    "Price" => 2500,
    "Category" => "Accessories",
    "Disscount" => "No Sorry"
    ],


[
    "P_id" => 2,
    "name"=> "t Shirt",
    "Price" => 1500,
    "Category" => "clothing"

],


[
    "P_id" => 3,
    "name"=> "shoe",
    "Price" => 3500,
    "Category" => "Footwear",
    "Rating" => 4.00
],



];

foreach($products as $prd){
    echo "Product id:". $prd["P_id"]."<br>";
    echo "Product Name:" . $prd["name"]. "<br>";
    echo "Product Price:" . $prd["Price"]. "<br>";
    echo "Product category:" . $prd["Category"]. "<br><br>";


    // rating mene sirf aeyk product me di he thats why jb loop chaleyga agr mene rating ko oper bhi echo kaaryaa to wo error deyga baki me jis me rating key nhi hogi thats why mujhe error nhi chaei is keye me yaha pr ye function chala raha ho ta ky wo ye check kry hr products pr agr rating key value available he to wo print krwaeyga other wise nhi krwayega 
    if(isset($prd["Rating"])){
        echo "Product Rating:" . $prd["Rating"]. "<br>";
    };


    // same aesi tarah mene disscount k lyeye bhui keya he 
    if(isset($prd["Disscount"])){
        echo "Discount:" . $prd["Disscount"]. "<br>";
    }
    echo "<hr>";
   

}


?>