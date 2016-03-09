<?php
	$host="localhost";
	$user="root";
	$password="";
	$dbname="SI6";

	$link = mysql_connect($host,$user,$password)
    	or die("Impossible de se connecter : " . mysql_error());

    $connexion = mysql_select_db($dbname)
        or die("Impossible d'ouvrir la base : ".mysql_error());
?>