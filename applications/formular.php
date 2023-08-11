<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kinopreise</title>
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<b>Tickets</b><br><br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="number" name="adult" placeholder="Erwachsene"><br>
<input type="number" name="child" placeholder="Kinder"><br>
<input type="radio" name="ja" placeholder="ja" value="ja">Ja
<input type="radio" name="nein" placeholder="nein" checked>Nein<br>
<button type="submit" name="submit">Berechnen</button><br>
</form>

<?php

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

$finalAdult = $costAdult * $adult;
$finalChild = $costChild * $child;
$finalCost = $finalChild + $finalAdult;

if($finalCost < 0 || $finalAdult < 0 || $finalChild < 0){
    echo "Fehler bei der Eingabe!<br>";
    return;
}

print "Erwachsene: $adult | $finalAdult € <br>";
print "Kinder: $child | $finalChild € <br>";
print "Gesamtpreis: $finalCost € <br>";
if(isset($_POST["ja"])){
    if($_POST["ja"]){
        $rabatt = $finalCost - ($finalCost*0.1);
        print "Neuer Preis: $rabatt € <br>";
    }
}

unset($adult);
unset($child);

?>

</body>
</html>
