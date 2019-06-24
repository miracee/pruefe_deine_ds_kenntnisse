<?php

require('funktionen.php');
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
			liefer_admin_uebersicht();
			break;
	}
}
function liefer_admin_uebersicht() {echo 'TODO Übersicht';}
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
