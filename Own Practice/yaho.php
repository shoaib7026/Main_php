<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yahoo Email Restricted </title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>

</head>
<body>
    <h1>Yahoo Email Restricted </h1>
   <form action="" method="post">
    <label for="name">Name</label><br>
    <input type="text" name="name" placeholder="Enter Your Name" required><br><br>

<label for="Emial">Email</label><br>
<input type="email" name="email" placeholder="Enter Your Email" required><br><br>

<button type="submit" name="btn">Submit</button>

   </form>

   <?php
   if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

// echo "<br>". $name ."<br><br>";
// echo $email;

$restricted = "yahoo.com";
$breakuseremial = explode(separator: '@',string: $email);



$domain = $breakuseremial[1];

// echo $domain;

if($domain == $restricted){
    echo "Sorry " .($name). "We Dont Accept yahoo users";
}
else{
    echo "Welcome ". ($name);
}




   }
   
   ?>
</body>
</html>