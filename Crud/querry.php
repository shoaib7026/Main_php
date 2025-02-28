<?php
include("dbcon.php");
session_start();


$username = $useremail = $userpassword = $userconfrmpassword = "";
$usernameerr = $useremailerr = $userpassworderr = $userconfrmpassworderr = "";


if (isset($_POST["Registered"])) {

    $username = $_POST['uname'];
    $useremail = $_POST['uemail'];
    $userpassword = $_POST['upassword'];
    $userconfrmpassword = $_POST['uconfirmpassword'];

    if (empty($username)) {
        $usernameerr = 'Enter Your good name please';
    }
    if (empty($useremail)) {
        $useremailerr = ' Aby bhai Email To Dalo';


    }
    // yaha pr dalo email wala fetch assoc se krwaya he 
    else {
        $querry = $conn->prepare("SELECT * FROM userss WHERE Email = :uemail");
        $querry->bindParam(':uemail', $useremail);

        $querry->execute();

        $emailCheck = $querry->fetch(PDO::FETCH_ASSOC);

        if ($emailCheck) {
            $useremailerr = "Ap ye Email Nhi Dal Skty bhai Ye Kesi or ki he  ";
        }
    }



    if (empty($userpassword)) {
        $userpassworderr = ' Password kn Daleyga';
    }
    if (empty($userconfrmpassword)) {
        $userconfrmpassworderr = ' Confirm Password To Kro yar ';
    }


    if ($userpassword != $userconfrmpassword) {
        $userconfrmpassworderr = ' Password Match Nhi he Bhai ';
    }



    if (empty($usernameerr) && empty($useremailerr) && empty($userpassworderr) && empty($userconfrmpassworderr)) {

        $querry = $conn->prepare('INSERT INTO userss (Name,Email,Password,Confrm_Password) VALUES (:uname , :uemail ,:upassword, :uconfirmpassword)');

        $querry->bindParam(':uname', $username);
        $querry->bindParam(':uemail', $useremail);
        $querry->bindParam(':upassword', $userpassword);
        $querry->bindParam(':uconfirmpassword', $userconfrmpassword);



        if ($querry->execute()) {
            echo "
       <script>
      alert('Welcome, " . $username . "!');
    window.location.href= 'signup.php';
</script>
        ";
            exit();
        } else {

            echo '<script> 

        alert("Erorr");
        </script> ';
        }

    }



}




if (isset($_POST["login"])) {

    $useremail = $_POST['uemail'];
    $userpassword = $_POST['upassword'];

    $querry = $conn->prepare("SELECT * FROM userss WHERE Email = :uemail");
    $querry->bindParam(':uemail', $useremail);
    $querry->execute();
    $user = $querry->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['Password'] == $userpassword) {

               $_SESSION['userid'] = $user['id'];
               $_SESSION['name'] = $user['Name'];
               $_SESSION['role'] = $user['Role_id'];


               if($user['Role_id'] == 2){
                header("location: admin.php");
                exit();
               }
               else{
                   header("location: user.php");
               }

//             echo "
//        <script>
//       alert('Welcome, " . $user['Name'] . "!');
//     window.location.href= 'signup.php';
// </script>
//         ";
            exit();
        } else {
            $userpassworderr = ' Apna Password hi yad nhi wa bhai wa  ';
        }


    } else {

        $useremailerr = ' Email Nhi Mila Bhai ';

    }
    if (empty($userpassword)) {
        $userpassworderr = ' Password Kn Daleyga Bhai ';
    }

    if (empty($useremail)) {
        $useremailerr = 'Email Kn Daleyga Bhai';
    }




}

?>