<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assingment 1 Loan scheme </title>
    <style>
        .container form{
            width: 300px;
            overflow: hidden;
            padding:8px 0px;
            border-radius: 8px;
        }
        .container form input{
            width: 100%;
            padding: 8px 5px;
        }
        .container form label{
            font-size: 18px;
            padding: 8px 5px;
            

        }
        .container form select {
            width: 100%;
        }
    </style>

</head>
<body>
    
    <h2 style="text-align: center;">Loan Scheme</h2>
<div class="container" style="width: 100%;   display:flex ; align-items: center; justify-content: center;">   
     <form action="" method="post" style="border: 1px solid black; ">
<label for="Name">Name</label><br>
<input type="text" name="name" placeholder="Enter Your name" required><br><br>

<label for="Age">Age</label><br>
<input type="number" name="age" placeholder="Enter your Age" required><br><br>

<label for="Salary">Salary</label><br>
<input type="number" name="salary" placeholder="Salary" required><br><br>

<label for="Loan Amount">Loan Amount</label><br>
<select name="loan_amount" required>
    <option disabled selected></option>
    <option value="400000" >400000</option>
    <option value="500000">500000</option>
    <option value="600000">600000</option>

</select><br><br>

<label for="years of instalment">Years Of Installment</label><br>
<select name="loanyears" required>
    <option disabled selected></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>

</select><br><br>

<button style="padding: 10px; background-color: rgb(201, 201, 84); font-weight: bold; border: none; border-radius: 3px  ; margin-left: 40%; margin-bottom: 5px;" type="submit" name="check">Check</button>




    </form>
</div>


   

</body>
</html>
<?php
if(isset($_POST["check"])){

    $name = $_POST["name"];
    $Age = $_POST["age"];
    $Salary = $_POST["salary"];
    $loanamount = $_POST["loan_amount"];
    $years = $_POST["loanyears"];

if($Age > 22 AND $Salary > 40000){
$installment = $loanamount / ($years * 12);

echo "<h3> Welcome  " . $name. " You are Eleigble For loan your Monthly Installment Is (" .$installment . ")</h3>" ;

}
else{
    echo "<h3> Sorry " .$name. " You Are Not Eliglbe For loan". "</h3>";
}

}

?>