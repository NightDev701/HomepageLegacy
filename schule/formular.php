<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kinopreise</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<b>Tickets</b><br><br>

<form action="formular.php" method="post">
<input type="number" name="adult" placeholder="Erwachsene"><br>
<input type="number" name="child" placeholder="Kinder"><br><br>

Familienkarte <input type="radio" name="family" value="ja">Ja
<input type="radio" name="family" value="nein" checked>Nein<br>

Film Dimension <input type="radio" name="dim" value="2d" checked>2D
<input type="radio" name="dim" value="3d">3D<br><br>

<button type="submit" name="submit">Berechnen</button><br><br>
</form>

<?php

$filmlänge = 120;
$zuschlag = 0.5;

while($filmlänge <= 180){
    echo "$filmlänge Min $zuschlag EUR<br>";
    $filmlänge = $filmlänge + 15;
    $zuschlag = $zuschlag + 0.5;
}
echo "<br>";

$costAdult = 11;
$costChild = 8;

$adult = $_POST["adult"] ?? 0;
$child = $_POST["child"] ?? 0;

if($adult == null){
    $adult = 0;
}
if($child == null){
    $child = 0;
}

$cards = $adult+$child;

$finalAdult = $costAdult * $adult;
$finalChild = $costChild * $child;
$finalCost = $finalChild + $finalAdult;

if($finalCost < 0 || $finalAdult < 0 || $finalChild < 0){
    echo "Fehler bei der Eingabe!<br>";
    return;
}

print "Es wurden $cards Karten verkauft!<br><br>";
print "Erwachsene: $adult | $finalAdult € <br>";
print "Kinder: $child | $finalChild € <br>";
print "Gesamtpreis: $finalCost € <br><br>";

if(isset($_POST["family"])){
    if($_POST["family"] == "ja"){
        $finalCost = $finalCost - ($finalCost*0.1);
        print "Rabatt durch Familienkarte: $finalCost € <br>";
    }
}
if(isset($_POST["dim"])){
    if($_POST["dim"] == "2d" && $cards >= 5){
        $finalCost = $finalCost - ($finalCost*0.1);
        print "Rabatt durch 2D Film und $cards Personen: $finalCost € <br>";
    }
}

unset($adult);
unset($child);

?>

</body>
</html>
