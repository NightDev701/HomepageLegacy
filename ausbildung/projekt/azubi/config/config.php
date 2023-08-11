<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $_POST["device"]; ?>
    </title>
</head>
<body>

    <?php

    $pattern = '/^[-\d,]+$/';

    $pw = $_POST["pw"];
    $switch = $_POST["device"];
    $loc = $_POST["location"];
    $gw = $_POST["gateway"];

    $client = $_POST["vlan-client"];
    $printer = $_POST["vlan-printer"];
    $scanner = $_POST["vlan-scanner"];
    $iot = $_POST["vlan-iot"];
    $cam = $_POST["vlan-cam"];
    $phone = $_POST["vlan-phone"];
    $management = $_POST["vlan-management"];
    $server = $_POST["vlan-server"];

    $ipm = $_POST["ip-management"];

    if($_POST["switch"] == "arubs-os"){
        if(!preg_match($pattern, $client) ||
            !preg_match($pattern, $printer) ||
            !preg_match($pattern, $scanner) ||
            !preg_match($pattern, $iot) ||
            !preg_match($pattern, $cam) ||
            !preg_match($pattern, $phone) ||
            !preg_match($pattern, $management) ||
            !preg_match($pattern, $server)){
                echo "Fehlerhafte eingabe bei den VLAN Ports! Es sind nur folgende Zeichen möglich (0-9), (-) und (,)!";
                exit;
        }

        echo "config<br>
                no tftp server<br>
                no telnet-server<br>
                no dhcp config-file-update<br>
                no dhcp image-file-update<br>
                no dhcp tr69-acs-url<br>
                password manager user-name admin plaintext $pw<br>
                password manager user-name admin plaintext $pw<br>
                password operator user-name admin plaintext $pw<br>
                hostname $switch<br>
                ip dns server-address priority 1 192.168.201.20<br>
                ip dns server-address priority 2 192.168.201.21<br>
                ip dns domain-name tst-nf.local<br>
                time daylight-time-rule western-europe<br>
                time timezone 60<br>
                timesync sntp<br>
                sntp unicast<br>
                sntp server priority 1 192.168.201.20<br>
                snmp-server community \"public\" unrestricted<br>
                snmp-server location \"$loc\"<br>
                snmp-server contact \"it@tst-logistics.com\"<br>
                spanning-tree<br>
                ip default-gateway $gw<br>

                vlan 300<br>
                name Clients<br>";
                if($client != "0"){
                    echo "tagged $client<br>";
                }

                echo"vlan 301<br>
                name Drucker<br>";
                if($printer != "0"){
                    echo "tagged $printer<br>";
                }

                echo "vlan 302<br>
                name Scanner<br>";
                if($scanner != "0"){
                    echo "tagged $scanner<br>";
                }

                echo "vlan 303<br>
                name IoT<br>";
                if($iot != "0"){
                    echo "tagged $iot<br>";
                }

                echo "vlan 304<br>
                name Kameras<br>";

                if($cam != "0"){
                    echo "tagged $cam<br>";
                }
                echo "vlan 305<br>
                name Telefon<br>";

                if($phone != "0"){
                    echo "tagged $phone<br>";
                }

                echo "vlan 306<br>
                name Management<br>";

                if($management != "0"){
                    echo "tagged $management<br>";
                }

                echo "ip address $ipm<br>
                vlan 307<br>
                name Server<br>";

                if($server != "0"){
                    echo "tagged $server<br>";
                }

                echo "exit<br>
                crypto key generate ssh rsa bits 2048<br>
                ip ssh<br>
                exit<br>
                wr mem
            ";
    } else if($_POST["switch"] == "arubs-os-cx"){
        echo "Noch in Arbeit!<br>";
    } else if($_POST["switch"] == "arubs-os-cx-6000"){
        echo "Noch in Arbeit!<br>";
    } else {
        echo "Element wurde nicht gefunden.<br>";
    }

    ?>

</body>
</html>
