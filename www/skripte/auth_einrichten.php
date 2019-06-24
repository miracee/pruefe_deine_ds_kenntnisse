<?php
$pw1 = $_POST["psswd1"];
$pw2 = $_POST["psswd2"];

require('startseite.php');

function richte_auth_ein()
{
	global $pw1, $pw2;
	
	if(strlen($pw1) < 10) {
		$fehlermeldung = "\n<p><font color=\"ff0000\">Das Passwort ist nicht lang genug.</font></p>";
		liefer_passwortsetzen($fehlermeldung);
		exit;
	}

	if(strcmp ($pw1, $pw2) !== 0) {
        $fehlermeldung = "\n<p><font color=\"ff0000\">Die eingebenen Passworte waren nicht identisch.</font></p>";
        liefer_passwortsetzen($fehlermeldung);
        exit;
    }

	$gb = 0; // Großbuchstaben
    $kb = 0; // Kleinbuchstaben
    $zf = 0; // Ziffern
    $sz = 0; // Sonderzeichen

    for($i = 0, $j = strlen($pw2); $i < $j; $i++) {
        $z = substr($pw2, $i, 1);
        if(preg_match('/^[[:upper:]ÄÖÜ]$/', $z)) {
            $gb++;
        } elseif(preg_match('/^[[:lower:]äöüß]$/', $z)) {
            $kb++;
        } elseif(preg_match('/^[[:digit:]]$/', $z)) {
            $zf++;
        } else {
            $sz++;
        }
    }

	if($gb < 1 or $kb < 1 or $zf < 1 or $sz < 1) {
        $fehlermeldung = "\n<p><font color=\"ff0000\">Das Passwort muss aus Groß- und Kleinbuchstaben sowie Ziffern und Sonderzeichen bestehen.</font></p>";
        liefer_passwortsetzen($fehlermeldung);
        exit;
    }

	require('../konfiguration/init.php');

	$pw = $pw1 . strrev($schreibende) . strrev($pw1) . $schreibende;
	$pwcrypt = password_hash($pw, PASSWORD_DEFAULT);
	$anfrage = "UPDATE anmeldung SET anm_passwort='$pwcrypt', anm_letzte_aenderung=unix_timestamp(current_timestamp) WHERE anm_i=$schreibende";
	$verb_s = mysqli_connect("$db_host", "$db_user_s", "$db_pass_s", "$db_name");
    if(mysqli_connect_errno()) {
        liefer_verbindungsfehler();
        // echo mysqli_connect_error();
        exit(1);
    }
	if(!($verb_s->query("$anfrage"))) {
        mysqli_close($verb_l);
        liefer_datenbankfehler();
        // echo printf("MariaDB: %s", $verb_s->error);
        mysqli_close($verb_s);
        exit(1);
    }
    mysqli_close($verb_s);

    $fehlermeldung = '';
	liefer_anmeldung($fehlermeldung);	
}
