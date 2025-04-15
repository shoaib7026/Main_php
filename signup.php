<?php
include("components/header.php");
include("php/connection.php");
?>

<?php

$username = $useremail = $userpassword = $userconfrmpassword = "";
$usernameerr = $useremailerr = $userpassworderr = $userconfrmpassworderr = "";

if (isset($_POST['signup'])) {
    $username = $_POST['uname'];
    $useremail = $_POST['uEmail'];
    $userpassword = $_POST['uPassword'];
    $userconfrmpassword = $_POST['uConfirmPassword'];

    if (empty($username)) {
        $usernameerr = "Arey Bhai Name To Batao!";
    }

    if (empty($useremail)) {
        $useremailerr = "Email Bhi bata do!";
    }

    if (empty($userpassword)) {
        $userpassworderr = "Enter Your ATM Pin!";
    }

    if ($userconfrmpassword !== $userpassword) {
        $userconfrmpassworderr = "Arey Bhai Sahi Password To Dalo !";
    }

if(empty($usernameerr) AND empty($useremailerr) AND empty($userpassworderr) AND empty($userconfrmpassworderr)){

       $querry = $pdo->prepare("INSERT INTO susers (Name,Email,Password,Confrm_Password) VALUES(:uname, :uemail,:upassword, :ucnfrmpasword)");

       $querry->bindParam(":uname", $username);
       $querry->bindParam(":uemail" , $useremail);
       $querry->bindParam(":upassword", $userpassword);
       $querry->bindParam(":ucnfrmpasword" , $userconfrmpassword);

       if($querry->execute()){
        echo"
        <script>alert('Welcome  $username');
        
      window.location.href = 'index.php';

        </script>
        ";
       }

       else{
        echo "<script>alert('Chal Bhagg Try Kr Dobara');</script>";
       }


}


}
?>






<div class="container p-5 mt-5">
            <form action="" method="post">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="uname" value="<?php echo $username ?>" id="" class="form-control"  placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo   $usernameerr ?></small>
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="uEmail" value="<?php echo $useremail ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo  $useremailerr?></small>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="uPassword"  value="<?php echo $userpassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userpassworderr?></small>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="text" name="uConfirmPassword"  value="<?php echo $userconfrmpassword  ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userconfrmpassworderr?></small>
              </div>
              <button  name="signup" class="btn btn-success">Register</button>
            </form>
      </div>













<?php
include("components/footer.php");
?>