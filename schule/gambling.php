<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Glücksspiel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?php

$geld = 1000;
$gewinnstufe = 1;
$zuschlag = 0.5;

while ($gewinnstufe <= 5) {
    echo "Gewinnstufe " . $gewinnstufe . ": " . $geld . " €<br>";
    $geld = $geld + ($zuschlag * $geld);
    $gewinnstufe = $gewinnstufe + 1;
}

?>

</body>
</html>
