


<?php
include("querry.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      body{
        display: flex;
        align-items: center;
        justify-content: center;

      }
    </style>
  </head>
  <body>
      

  <form   method="POST" >

    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="uemail" id="" class="form-control" placeholder="" value="<?php echo  $useremail ?>" aria-describedby="helpId">
      <small id="helpId" class="text-danger"><?php echo $useremailerr?></small>

    </div>



    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="upassword" id="" class="form-control" placeholder="" value="<?php echo $userpassword ?>" aria-describedby="helpId">
      <small id="helpId" class="text-danger"><?php echo $userpassworderr?></small>

    </div>


  



    <button type="submit" name="login">Login</button>

    </form>
    
  </body>
</html>