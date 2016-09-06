<?php
	$hote='localhost';    // le chemin vers le serveur
	$port='3306';
	$nom_bd='slam4 ';        // le nom de votre base de données
	$utilisateur='root';  // nom d'utilisateur pour se connecter
	$mot_passe='';        // mot de passe 

	// ceation du Data Source Name, ou DSN, qui contient les infos
	// requises pour se connecter à la base.
	$dsn='mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd;
	echo $dsn;
	$connexion = new PDO($dsn, $utilisateur, $mot_passe);
?>

