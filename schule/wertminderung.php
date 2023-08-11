<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wertminderung</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<b>Wertminderungsrechner</b><br><br>

<form action="wertminderung.php" method="post">
    <input type="number" name="buy" step="0.01" placeholder="Anschaffung"><br>
    <input type="number" name="year" step="0.01" placeholder="Jährliche Minderung"><br>
    <input type="number" name="end" step="0.01" placeholder="Restwert"><br><br>
    <button type="submit" name="submit">Berechnen</button><br><br>
</form>

<?php

if(isset($_POST["submit"])){
    $anschaffung = $_POST["buy"];
    $jaehrliche_minderung = $_POST["year"];
    $restwert = $_POST["end"];
    $count = 0;

    if($restwert < 0){
        echo "Es darf kein Negativ wert geben als Restwert!<br>";
        return;
    }
    if($jaehrliche_minderung < 0){
        echo "Es darf kein Negativ wert geben als Jährlicheminderung!<br>";
        return;
    }
    if($anschaffung < 0){
        echo "Es darf kein Negativ wert geben als Anschaffungswert!<br>";
        return;
    }
    if($restwert > $anschaffung){
        echo "Die Anschaffung muss größer sein als der Restwert!<br>";
        return;
    }

    echo "Anschaffungswert: $anschaffung €<br>";
    echo "Restwert: $restwert €<br><br>";

    while($anschaffung > $restwert){
        echo "$count >> $anschaffung €<br>";
        $anschaffung = number_format($anschaffung - ($anschaffung * $jaehrliche_minderung / 100),2, ".");
        $count++;
    }
}

?>

</body>
</html>
