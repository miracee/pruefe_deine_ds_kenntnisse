<?php

function formular_frage($farbe, $liste_kategorie, $kat, $katbez)
{
	$rg = "<h2><a name=\"kategorie\"><font color=\"$farbe\">Fragen</font></a></h2>\n";
	$rg .= "<p><form action=\"katwahl.php\" method=\"post\">\n";
	$rg .= "<select name=\"katauswahl\">\n";
	$rg .= $liste_kategorie;
	$rg .= "</select><br />&nbsp;<br />\n";
	$rg .= "<input type=\"submit\" value=\"Auswahl senden\"></input>\n";
	$rg .= "</form></p>\n";
	if($kat < 1) {
		$rg .= "<font color=\"ff0000\">Bitte erst eine Kategorie wählen</font>\n";
		return $rg;
	}
	$rg .= "<p>Kategorie " . $kat . "&nbsp;" . $katbez . "</p>\n";
	$rg .= "<p><form action=\"katwahl.php\" method=\"post\">\n";
	$rg .= "<input type=\"hidden\" name=\"katid\" id=\"katid\" values\"$kat\">\n";
	$rg .= "Frage:<br />\n";
	$rg .= "<textarea name=\"frage\" id=\"frage\" cols=\"64\" row=\"4\"></textarea><br />&nbsp;<br />\n";
	$rg .= "Richtige Antworten (es d&uuml;rfen Felder leer bleiben): <br />\n";	
    $rg .= "<textarea name=\"ra1\" id=\"ra1\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"ra2\" id=\"ra2\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
    $rg .= "<textarea name=\"ra3\" id=\"ra3\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"ra4\" id=\"ra4\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
    $rg .= "<textarea name=\"ra5\" id=\"ra5\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"ra6\" id=\"ra6\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
    $rg .= "Falsche Antworten (es d&uuml;rfen Felder leer bleiben): <br />\n";
    $rg .= "<textarea name=\"fa1\" id=\"fa1\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"fa2\" id=\"fa2\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
    $rg .= "<textarea name=\"fa3\" id=\"fa3\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"fa4\" id=\"fa4\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
    $rg .= "<textarea name=\"fa5\" id=\"fa5\" cols=\"32\" row=\"4\"></textarea>&nbsp;&nbsp;&nbsp;<textarea name=\"fa6\" id=\"fa6\" cols=\"32\" row=\"4\"></textarea><br />&nbsp;<br />";
	$rg .= "<input type=\"submit\" value=\"Daten senden\"></input>\n";
    $rg .= "</form></p>\n";
}


function formular_kategorie($farbe, $kategorien)
{
	$rg = "<h2><a name=\"kategorie\"><font color=\"$farbe\">Kategorie</font></a></h2>\n";
	$rg .= "$kategorien\n";
	$rg .= "<p><form action=\"kategorie.php\" method=\"post\">\n";
	$rg .= "ID:<br />";
	$rg .= "<input type=\"text\" name=\"katid\" id=\"katid\" maxlength=\"10\"></input><br />&nbsp;<br />\n";
	$rg .= "Bezeichnung:<br />";
	$rg .= "<input type=\"text\" name=\"katbez\" id=\"katbez\" maxlength=\"64\"></input><br />&nbsp;<br />\n";	
	$rg .= "<input type=\"submit\" value=\"Kategorie anlegen\"></input>\n";
	$rg .= "</form></p>\n";
	return $rg;
}

function manage($farbe, $farbe2, $kategorien, $liste_kategorie, $fehler, $kat, $katbez)
{
	echo "<h2><font color=\"$farbe\">Frageverwaltung</font></h2>\n";
	echo "$fehler\n";
    echo "<p><a href=\"#kategorie\">Kategorie</a>";
    echo "</p>";
    echo "<hr />\n";
	echo formular_kategorie($farbe2, $kategorien) . "\n";
	echo "<hr />\n";
	echo formular_frage($farbe2, $liste_kategorie, $kat, $katbez) . "\n";
}
