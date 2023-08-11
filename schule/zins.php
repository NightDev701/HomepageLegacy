<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <title>Zins</title>
</head>
<body>
<?php

$k = 1000;
$prozent = 5;
$anlagedauer = 3;

$k1 = $k * (1 + $prozent / 100);

$i = 0;
while($i < $anlagedauer){
    $i++;

    echo "$i) ".number_format($k1, 2, ".")." €<br>";
    $k1 = $k1 + $k1 * ($prozent / 100);

}

?>
</body>
</html>
