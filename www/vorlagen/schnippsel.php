<?php
function anmeldelayout_admin($farbe, $fehler, $nutzerin)
{
	echo "<h2><font color=\"$farbe\">Anmeldung</font></h2>\n";
    echo "$fehler\n";
    echo "<h3>Bitte Passwort eingeben</h3>\n";
    echo "<form action=\"adminuebersicht.php\" method=\"post\">\n";
    echo "<input type=\"text\" name=\"psswt\" id=\"psswt\" maxlength=\"64\"></input><br />";
    echo "<input type=\"hidden\" name=\"hddn1\" id=\"hddn1\" value=\"$nutzerin\">\n";
    echo "&nbsp;<br />\n";
    echo "<input type=\"submit\" value=\"Daten senden\"></input>\n";
    echo "</form>\n";
}
function kopf($titel)
{
	echo "<html>\n<head><title>$titel</title></head>\n<body>";
}

function fuss($version, $letzte_aenderung)
{
	echo "<hr>\n";
	echo "<small><font color=\"#666666\">Version $version, $letzte_aenderung - SHo Datenschutz\n";
	echo "</body>\n</html>\n";
}

function passwortsetztext($farbe, $fehler)
{
	echo "<h2><font color=\"$farbe\">Passwort setzen</font></h2>\n";
    echo "<p>Gesetze und Vorschriften sowohl zum Datenschutz als auch zur IT-Sicherheit schreiben Privacy by Default (datenschutzfreundliche Voreinstellungen) vor.<br />Daher ist hier eingestellt, dass das Passwort aus mind. 10 Zeichen, Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen besteht.</p>\n";
    echo "<p>Das Passwort wird verschlüsselt abgelegt und kann nach dem Anlegen von niemandem in Klartext eingesehen werden.<br />Nur Sie kennen das Passwort.</p>\n";
    echo "<p>Tipp: Eine Möglichkeit zur Findung von Passworten ist die Bildung von Merksätzen:<br />Merksatz:&nbsp;&quot;Es war die Nachtigall, die nachts um drei trällerte!&quot;<br />wird zu:&nbsp;&quot;EwdN,dnu3t!&quot;<br />&nbsp;<br />";
    echo "Der Satz&nbsp;&quot;Es war die Nachtigall, die nachts um 3 trällerte!&quot; kann natürlich auch als ganzer Satz als Passwort verwendet werden.</p>$fehler\n";
    echo "<h3>Legen Sie ein Passwort fest</h3>\n";
    echo "<form action=\"auth_setzen.php\" method=\"post\">\n";
    echo "<input type=\"text\" name=\"psswd1\" id=\"psswd1\" maxlength=\"64\"></input><br />";
    echo "<h3>Wiederholen Sie das Passwort</h3>\n";
    echo "<input type=\"text\" name=\"psswd2\" id=\"psswd2\" maxlength=\"64\"></input><br />";
    echo "&nbsp;<br />\n";
    echo "<input type=\"submit\" value=\"Daten senden\"></input>\n";
    echo "</form>\n";
}
