<?php

function liefer_datenbankfehler()
{
    echo "<html>\n<head><title>Fehler</title></head>\n<body>\n";
    echo "<h3><font color=\"ff0000\">Fehler</font></h3>\n";
    echo "Es ist ein Fehler bei der Kommunikation mit der Datenbank aufgetreten.<br \>";
    echo "Sollte sich das Problem in Kürze nicht selbst beheben,<br />";
    echo "sagen Sie bitte Frau Holzgraefe Bescheid.\n";
    echo "</body></html>";
}

function liefer_verbindungsfehler()
{
    echo "<html>\n<head><title>Fehler</title></head>\n<body>\n";
    echo "<h3><font color=\"ff0000\">Fehler</font></h3>\n";
    echo "Es ist beim Auslesen der Seite ein Fehler aufgetreten.<br \>";
    echo "Sollte sich das Problem in Kürze nicht selbst beheben,<br />";
    echo "sagen Sie bitte Frau Holzgraefe Bescheid.\n";
    echo "</body></html>";
}

