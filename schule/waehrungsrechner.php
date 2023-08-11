<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Währungsrechner</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="pictures/sunlight.png" rel="icon">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<center><b>Währungsrechner</b></center><br><br>

<form action="waehrungsrechner.php" method="post">
    <input type="money" name="money" placeholder="Umrechnungswert"><br>
    <input type="radio" name="euro" placeholder="euro" value="euro">EURO
    <input type="radio" name="usd" placeholder="usd" checked>USD<br>
    <button type="submit" name="submit">Berechnen</button><br>
</form>

<center>
    <?php

    if(isset($_POST["usd"])){
        $usd_wert = $_POST["usd"] * 1.1350;
        echo "USD > EU = {$usd_wert}";
    } else if(isset($_POST["euro"])){
        $euro_wert = $_POST["money"] * 0.8810;
        echo "EU > USD = {$euro_wert}";
    }

    ?>
</center>
</body>
</html>
