<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sim Number Checking </title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: saddlebrown;
        }
        form label{
            color: white;
            font-size: 18px;
        }
        form input{
            padding: 6px;
        }
        form button{
            padding: 8px 10px;
            margin-left: 65px;
            border-radius: 8px;
            border: none;
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1 style="color: white;">Sim Number Checking </h1>
    
<form action="" method="post">
    <label for="name">Name</label><br>
    <input type="text" name="name" placeholder="Enter Your Name " required><br><br>

    <label for="number">Number</label><br>
    <input type="number" name="number" placeholder="Enter your Number " required><br><br>

    <button type="submit" name="btn">Check</button>

</form><br>
</body>
</html>
<?php
if(isset($_POST["btn"])){
    $name= $_POST["name"];
    $number = $_POST["number"];

    // echo"<h1>".$name."<br>".$number."</h1>";

    $sim_companies = [
        "0300" => "Jazz", "0301" => "Jazz", "0302" => "Jazz", "0303" => "Jazz", "0304" => "Jazz", "0305" => "Jazz",
        "0306"=> "Jazz", "0307"=> "Jazz", "0308"=> "Jazz", "0309" => "Jazz",

        "0318" => "Zong", "0311" => "Zong", "0312" => "Zong", "0313" => "Zong", "0314" => "Zong", "0315" => "Zong", "0316" => "Zong", "0317" => "Zong", "0319" => "Zong",

        "0320" => "Warid", "0321" => "Warid", "0322" => "Warid", "0323" => "Warid", "0324" => "Warid", "0325" => "Warid", "0326" => "Warid", "0327" => "Warid", "0328" => "Warid", "0329" => "Warid",

        "0330" => "Ufone", "0331" => "Ufone", "0332" => "Ufone", "0333" => "Ufone", "0334" => "Ufone", "0335" => "Ufone", "0336" => "Ufone", "0337" => "Ufone", "0338" => "Ufone", "0339" => "Ufone",

        "0340" => "Telenor", "0341" => "Telenor", "0342" => "Telenor", "0343" => "Telenor", "0344" => "Telenor", "0345" => "Telenor", "0346" => "Telenor", "0347" => "Telenor",  "0348"=> "Telenor","0349" => "Telenor"
    ];

// isko humne substr se breake kea he because ye number he hm aesy explode se nhi kr skty beacuse explode ko separtor se hi kr skta he like @ - . , or number me to koi seprator nhi thats why mene is se keya he 
    $breaknumber = substr($number,0,4);

    // echo $breaknumber;


// array key exist se is leye keya he hm direct == is comparison nhi kr ksty beacuse number string to nhi he is leye array key exist se kr rahy he array se compare 
    if(array_key_exists($breaknumber, $sim_companies)){
        echo " <h1>Mr.". ($name)." Your Sim Belong to " . $sim_companies[$breaknumber]."</h1>";
    }
    else{
        echo " Sorry ".($name). " Not Found this Company Registerd in Pakistan";
    }
}


?>