<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        // yaha abhi me string function ka kam kr raha ho jis me hm explode lentgt word count  pr kam kreyngy 
$wordcount="Hello How are you? lorem ipsum dolor sit amet consectetur lorem adipisicing elit. Quisquam voluptatum lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum";

$count = str_word_count($wordcount);

echo $count;


//  ab hm length count kreyngy yaha se oper humne word count keye he 

$lengthcountwala = strlen($wordcount);

echo "<br>";
echo $lengthcountwala;

// ab explode  function ka kam kr raha hu

$explode = explode(". ",$wordcount);
echo "<br>";

print_r($explode);

   $str = "Hello world i Am a php developer";
   echo "<br>";
   
// AB yaha se  hm str rev ka kam kr rahy he 



$strrevwala = strrev($wordcount);

echo "<br>";

echo $strrevwala;

// or ab yaha se uc uper case wala kr rahy he 

$ucwala = ucwords($wordcount);

echo "<br>";

echo $ucwala;

// or ab yaha se replace wala kr rahy he 

$replacewala = str_replace("lorem", "Rizwan bhai", $wordcount);

?>

    <br>
<?php
echo $replacewala;
?>

   
    

</body>
</html>
































