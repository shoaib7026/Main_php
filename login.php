<?php
session_start();


?>

<?php
include("components/header.php");
include("php/connection.php");
?>

<?php
$useremail = $userpassword = "";
$useremailerr = $userpassworderr = "";


if(isset($_POST['Login'])){

$useremail = $_POST['email'];
$userpassword =$_POST['password'];

if(empty($useremail)){
  $useremailerr = " Enter Your Email Please!";

}
if(empty($userpassword)){
  $userpassworderr ="Password bhi Daal Do yar !";
}
 
if(empty($useremailerr ) AND empty($userpassworderr )){

$querry = $pdo->prepare("SELECT * FROM susers WHERE Email = :uemail");

$querry->bindParam(":uemail" , $useremail);

$querry->execute();

$loginusers = $querry->fetch(PDO::FETCH_ASSOC);

print_r($loginusers);


if($loginusers){
  
  if($loginusers['Password'] == $userpassword){
if($loginusers['Role_id'] == 1){

$_SESSION['userid'] = $loginusers['id'];
$_SESSION['username'] = $loginusers['Name'];
$_SESSION['useremail'] = $loginusers['Email'];


echo "<script>window.location.href='index.php?success=Welcome {$_SESSION['username']}';</script>";





}
else if($loginusers['Role_id'] == 2){
  $_SESSION['adminid'] = $loginusers['id'];
$_SESSION['adminname'] = $loginusers['Name'];

echo "<script>window.location.href='adminpanel/index.php?success=Welcome {$_SESSION['adminname']}';</script>";

}
  


  }
  else{
  
        echo "<script>alert('Password not Match');</script>";
    
    
  }
}




}


}

?>



<div class="container p-4 mt-5 ">
        <div class="col-md-10 ">    
                    <form class="col-md-8 " action="" method="post">
             
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php $useremail ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $useremailerr  ?></small>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password"  value="<?php $userpassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userpassworderr ?></small>
              </div>
             
              <button name="Login" class="btn btn-success ">Login</button>
            </form>
            </div>

</div>














<?php
include("components/footer.php");
?>