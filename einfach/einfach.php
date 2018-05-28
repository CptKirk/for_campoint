<html>

    <head>
        <title>Kostendiff. Bahn/PKW</title>
    </head>

    <body>

        <center>

        <h1>Kostenunterschied-Rechner Bahn/Auto</h1>

        <?php

        # Hier übertrage ich die Variablen von der einfach.html Seite
        $entfernung = $_POST['entfernung'];
        $bahn_km = $_POST['bahn_km'];
        $pkw_km = $_POST['pkw_km'];

        /* Im ersten if-Statement wird geschaut ob der PKW pro Kilometer mehr kostet.
           Wenn die Bedingung erfüllt ist, wird der Vorteil erst absolut und dann
           relativ berechnet. Dann werden beide Ergebnisse auf zwei Stellen nach dem
           Komma gekürzt.Im Anschluss wird das Ergebnis mittels echo wiedergegeben.
        */
        if($pkw_km > $bahn_km) {
            $vorteil = ($pkw_km * $entfernung) - ($bahn_km * $entfernung);
            $vorteil_rel = ($vorteil / ($bahn_km * $entfernung)) * 100;
            $vorteil_zd = number_format((float)$vorteil, 2, '.', '');
            $vorteil_rel_zd = number_format((float)$vorteil_rel, 2, '.', '');
            echo "Bei einer Entfernung von $entfernung km ist die Bahnfahrt um $vorteil_zd € oder $vorteil_rel_zd % günstiger, <br> als die Autofahrt."; 

        }

        # Hier wird das gleiche wie oben gemacht nur im Fall, dass die Bahn mehr kostet.
        # Man hätte hier auch einfach else nehmen können, statt if und der Bedingung.
        if($bahn_km > $pkw_km) {
            $vorteil = ($bahn_km * $entfernung) - ($pkw_km * $entfernung);
            $vorteil_rel = ($vorteil / ($pkw_km * $entfernung)) * 100;
            $vorteil_zd = number_format((float)$vorteil, 2, '.', '');
            $vorteil_rel_zd = number_format((float)$vorteil_rel, 2, '.', '');
            echo "Bei einer Entfernung von $entfernung km ist die Autofahrt um $vorteil_zd € oder $vorteil_rel_zd % günstiger, <br> als die Bahnfahrt."; 
        }

        ?>

        </center>

    </body>

</html>
