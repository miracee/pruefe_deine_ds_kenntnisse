<?php
require('../konfiguration/init.php');
require('../vorlagen/fehler.php');

$verb_l = mysqli_connect("$db_host", "$db_user_l", "$db_pass_l", "$db_name");

if(mysqli_connect_errno()) {
    liefer_verbindungsfehler();
    // echo mysqli_connect_error();
    exit(1);
}

function pruefe_anmeldung()
{
	global $verb_l, $schreibende;
	$rueckgabe = mysqli_fetch_assoc($verb_l->query("SELECT count(*) cnt FROM anmeldung wHERE anm_i=$schreibende AND anm_passwort is NULL"));
	$wert = $rueckgabe['cnt'];
	if($wert > 0) {return 0;}
	$ablf = mysqli_fetch_assoc($verb_l->query("SELECT (unix_timestamp(current_timestamp)-anm_zuletzt_angemeldet) dff FROM anmeldung WHERE anm_i=$schreibende"));
	$ablauf = $ablf['dff'];
	if($ablauf<900) {return 2;}
	return 1;
}

