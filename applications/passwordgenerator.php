<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Passwort Generator</title>
    <link href="../pictures/sunlight.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<center>

    <b>Passwort Generator</b><br><br>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button type="submit" name="submit">Generieren</button>
        <br><br><br><br>
    </form>

    <?php

    $kette = "qwertzuiopasdfghjklyxcvbnm0123456789QWERTZUIO!?*_[]PASDFGHJKLYXCBVNM";
    $len = strlen($kette);

    $code = "";
    for ($i = 0; $i < 16; $i++) {
        $zufall = rand(0, $len - 1);
        $code .= $kette[$zufall];
    }

    echo "Passwort: <b>{$code}<b>";

    ?>
</center>

</body>
</html>
