<?php

require('funktionen_s.php');
require('../vorlagen/schnippsel.php');

function liefer_admin_startseite()
{
	$anmeldung = 0;
	$anmeldung = pruefe_anmeldung();
	switch ($anmeldung) {
		case 0:
			liefer_admin_passwortsetzen('');
			break;
		case 1:
			liefer_admin_anmeldung('', 144);
			break;
		case 2:
			liefer_admin_uebersicht('');
			break;
	}
}

function liefer_admin_anmeldung($fehlermeldung, $nutzerin) 
{
	global $version, $letzte_aenderung, $farbe;
	kopf('Anmeldung');
	anmeldelayout_admin($farbe, $fehlermeldung, $nutzerin);
	fuss($version, $letzte_aenderung);
}

function liefer_admin_passwortsetzen($fehlermeldung)
{
	global $version, $letzte_aenderung, $farbe;
	kopf('Authentifizierung');
	passwortsetztext($farbe, $fehlermeldung);
	fuss($version, $letzte_aenderung);
}
function liefer_admin_uebersicht($fehler) 
{
    global $version, $letzte_aenderung, $farbe, $farbe2;
	$kategorien = hole_kategorien();
    require('../vorlagen/frageverwaltung.php');
	kopf('Administration');
	manage($farbe, $farbe2, $kategorien, $fehler);
    fuss($version, $letzte_aenderung);
}

