<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Stromverbraucht</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<b>Stromverbraucht</b><br><br>

<form action="stromverbrauch.php" method="post">
    <input type="number" name="verbrauch" step="0.01" id="totalAmt"><br>
    <button type="submit" name="submit">Berechnen</button><br><br>
</form>

<?php

    if(isset($_POST["submit"])) {
        $wert = $_POST["verbrauch"];

        $tarif1Arbeit = 31.50;
        $tarif1Grund = 2.97;

        $tarif2Arbeit = 28.90;
        $tarif2Grund = 5.94;

        $tarif3Arbeit = 26.50;
        $tarif3Grund = 11.84;

        $tarifJahr1 = $tarif1Grund*12;
        $tarifJahr2 = $tarif2Grund*12;
        $tarifJahr3 = $tarif3Grund*12;

        $preResult1 = $wert*$tarif1Arbeit;
        $preResult2 = $wert*$tarif2Arbeit;
        $preResult3 = $wert*$tarif3Arbeit;

        $result1 = $tarifJahr1 + $preResult1;
        $result2 = $tarifJahr2 + $preResult2;
        $result3 = $tarifJahr3 + $preResult3;

        if($result1 < $result2 && $result1 < $result3) {
            echo "Der Tarif 1 ist am günstigen mit {$result1} €";
        } else if($result2 < $result1 && $result2 < $result3) {
            echo "Der Tarif 2 ist am günstigen mit {$result2} €";
        }else if($result3 < $result2 && $result3 < $result1) {
            echo "Der Tarif 3 ist am günstigen mit {$result3} €";
        }
    }

?>

</body>
</html>
