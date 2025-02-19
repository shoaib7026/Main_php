<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select days And See Your Schedule</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <select name="days" id="">
            <option>Select</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        <button name="btn">Check</button><br /><br />
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {
    $selected = $_POST['days'];
    // echo $selected;

    switch ($selected) {
        case 'Monday':
            echo "you Are busy on Monday";

            break;
        case 'Tuesday':
            echo "You are Free On Tuesday";
            break;

        case 'Wednesday':
            echo "You Are in Meeting on Wednesday";
            break;

        case 'Thursday':
            echo "You are Going To Attend wedding of your friend";
            break;

        case 'Friday':
            echo "you Are in Trip on Friday";
            break;

        case 'Saturday':
            echo "Free On Saturday";
            break;

        case 'Sunday':
            echo "Off On Sunday";
            break;

        default:
            echo "select day";
            break;
    }
}


?>