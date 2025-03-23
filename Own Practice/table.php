<!DOCTYPE html>
<html>
<head>
    <title>Table of 16</title>
</head>
<body>

<h3>Multiplication Table of 16</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Number</th>
        <th>Multiplier</th>
        <th>Result</th>
    </tr>

    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<td>16</td>";
        echo "<td>$i</td>";
        echo "<td>" . (16 * $i) . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
