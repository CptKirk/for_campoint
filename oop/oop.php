<html>

    <head>
        <title>Kostendiff. Bahn/PKW</title>
    </head>

    <body>

        <center>

        <h1>Kostenunterschied-Rechner Bahn/Auto</h1>

        <?php

        class Transportmittel {

            # Konstruktor für die einzelnen Objekte der Klasse "Transportmittel".
            function __construct($name, $preis, $entfernung) {                
                $this->name = $name;
                $this->preis = $preis;
                $this->entfernung = $entfernung;
                $this->total = $preis * $entfernung;

            }

            /* Hier erstelle ich eine Funktion die erst ein Array erstellt mit den Objekten als Schlüssel.
               Als Wert nehme ich die Gesamtkosten für die Fahrt. Da ich einen Error bekommen habe als ich
               versucht habe ein Objekt als Schlüssel zu nehmen (illegal offset type), musste ich json_encode() 
               benutzen um daraus einen String zu machen. Als nächstes wird der Array nach Werten sortiert und 
               anschließend der kleinere Eintrag vom größeren abgezogen um den Vorteil auszurechnen. Dannach wird 
               der Prozentsatz berechnet. Zum Schluss wird das Ergebnis angezeigt wobei man hier beachten muss, 
               dass man json_decode() benutzt, da die Schlüssel noch als String und nicht Objekte vorliegen. */
            function rechne_Vorteil($typ1, $typ2) {   
                $arr = array(json_encode($typ1) => $typ1->total, json_encode($typ2) => $typ2->total);
                asort($arr);
                $vorteil = end($arr) - reset($arr);
                $keys = array_keys($arr); 
                $vorteil_rel = ($vorteil / reset($arr)) * 100;
                echo "Bei einer Entfernung von ". json_decode(reset($keys))->entfernung ."km ist die ". json_decode(reset($keys))->name ."fahrt um ". sprintf("%.2f",$vorteil) ."€ oder ". round($vorteil_rel, 2) ."% günstiger.";    

            }

        }

        # Hier werden die Objekte "Bahn" und "Auto" mit ihren Eigenschaften initialisiert. 
        $bahn = new Transportmittel("Bahn", $_POST['bahn_km'], $_POST['entfernung']);
        $auto = new Transportmittel("Auto", $_POST['pkw_km'], $_POST['entfernung']);

        # Führt die Funktion rechne_Vorteil() aus der Klasse "Transportmittel" mit den Objekten als Argumente aus.
        Transportmittel::rechne_Vorteil($bahn, $auto);

        ?>

        </center>

    </body>

</html>