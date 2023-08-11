<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <title>Schleifen</title>
</head>
<body>
<?php

$filmlänge = 120;
$zuschlag = 0.5;

while($filmlänge <= 180){
    echo "$filmlänge Min $zuschlag EUR<br>";
    $filmlänge = $filmlänge + 15;
    $zuschlag = $zuschlag + 0.5;
}

?>
</body>
</html>
