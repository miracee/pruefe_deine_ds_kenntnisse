<?php
$trowssap = $_POST["psswt"];
$nutzerin = $_POST["hddn1"];

require('startseite.php');

function pruefe_anmeldung_admin()
{
	global $trowssap;
	require ('../konfiguration/init.php');
	
	$pw = $trowssap . strrev($schreibende) . strrev($trowssap) . $schreibende;
	$pwcrypt = password_hash($pw, PASSWORD_DEFAULT);
	$verb_l = mysqli_connect("$db_host", "$db_user_l", "$db_pass_l", "$db_name");
	if(mysqli_connect_errno()) {
        liefer_verbindungsfehler();
        // echo mysqli_connect_error();
        exit(1);
    }

	$pw_hsh = mysqli_fetch_assoc($verb_l->query("SELECT anm_passwort FROM anmeldung WHERE anm_i=$schreibende"));
	$pw_hash = $pw_hsh['anm_passwort'];

	if (password_verify($pw, $pw_hash)) {
        liefer_admin_uebersicht();
		return;
    }
    $fehler = "\n<p><font color=\"ff0000\">Das eingebenen Passwort ist nicht richtig.</font></p>";
	liefer_admin_anmeldung($fehler, 144);
	return;
}

