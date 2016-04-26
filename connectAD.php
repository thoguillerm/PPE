<?php
	include "AccesDonnees.php";

	$ip=explode(".",$_SERVER['SERVER_ADDR']);
	
	echo "test : ".$ip[0];

	switch ($ip[0]) {

		case 127 :
		case 192 :
		//local
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "SI6";
			$port='3306';
			break;
			
		case 31 :
			//local
			$host = "127.0.0.1";
			$user = "u487153086_user";
			$password = "P@ssword";
			$dbname = "u487153086_si6";
			$port='3306';
			break;
			
		default :
			exit ("Serveur non reconnu...");
			break;
	}

	$connexion=connexion($host,$port,$dbname,$user,$password);
	
	if ($connexion) {
		echo "Connexion reussie<br />";
		echo "Base $dbname selectionnee... <br />";
		echo "Mode acces : $modeacces<br />";
	}

	
?>

