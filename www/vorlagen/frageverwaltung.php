<?php
function formular_kategorie($farbe, $kategorien)
{
	$rg = "<h2><a name=\"kategorie\"><font color=\"$farbe\">Kategorie</font></a></h2>\n";
	$rg .= "$kategorien\n";
	$rg .= "<form action=\"kategorie.php\" method=\"post\">\n";
	$rg .= "ID:<br />";
	$rg .= "<input type=\"text\" name=\"katid\" id=\"katid\" maxlength=\"10\"></input><br />&nbsp;<br />\n";
	$rg .= "Bezeichnung:<br />";
	$rg .= "<input type=\"text\" name=\"katbez\" id=\"katbez\" maxlength=\"64\"></input><br />&nbsp;<br />\n";	
	$rg .= "<input type=\"submit\" value=\"Kategorie anlegen\"></input>\n";
	$rg .= "</form>\n";
	return $rg;
}

function manage($farbe, $farbe2, $kategorien, $fehler)
{
	echo "<h2><font color=\"$farbe\">Frageverwaltung</font></h2>\n";
	echo "$fehler\n";
    echo "<p><a href=\"#kategorie\">Kategorie</a>";
    echo "</p>";
    echo "<hr />\n";
	echo formular_kategorie($farbe2, $kategorien);
}
