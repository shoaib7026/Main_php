<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Creating</title>
    <style> 
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

        /* .container{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        } */
        .container form input{
            padding: 12px;
        }
        .container form button{
            padding: 13px;
            background-color: rebeccapurple;
            color: white;
            border: none;
            border-radius: 8px;
        }
        .container form button:hover{
            background-color: rgb(163, 163, 107);
            color: black;
        }
         .table  td{
            padding: 20px;
            border: 1px solid black;
            font-size: 25px;


        }
        
        .table{
            border-collapse: collapse;
            margin-top: 20px;
        }


       

    </style>

</head>
<body>
    <h1 style="text-align: center;">Table</h1>
    <div class="container">
            <form action="" method="post">
        <input type="number" name="number" required placeholder="Enter Number Of Table ">  

        <input type="number" name="count" required placeholder="Enter Count Number">

        <button type="submit" name="create">Create Table</button>

    </form>
    </div>

    <?php
    if(isset($_POST["create"])){
        $number = $_POST["number"];
        $count = $_POST["count"];
?>

<table class="table" >

<?php
for($t = 1 ; $t <= $count; $t++){

    if ($t % 2 == 0) {
        echo "<tr style='background-color: lightgray;'>";
    } else {
        echo "<tr style='background-color: white;'>";
    };

    echo  "<td>" .$number. "</td>";
    echo  "<td>" ."*". "</td>";
    echo  "<td>" .$t. "</td>";
    echo  "<td>" ."=". "</td>";
    echo  "<td>" .($number*$t). "</td>";
    echo "</tr>";

  
    
}
?>
  <?php 
  }
    ?>
</table>




</body>
</html>