<?php
$modeacces = "mysql";

/**
 * 
 * Effectue une connexion a la base de donnee local 
 * @param unUtilisateur string
 *  <p>Nom de l'utilisateur.</p>
 * @param unMotdepasse string
 *  <p>Mot de passe de l'utilisateur.</p>
 * @param uneBasededonnee string
 *  <p>Nom de la base de donnees.</p>
 * 
 * @return Retourne l'identifiant de connexion MySQL en cas de succ�s 
 *         ou FALSE si une erreur survient.
 *         
 * @author Erwan Le Guen 
 * 
 * @version 1.2.3.4
 * 
 * @copyright Estran
 */
function connexion($host,$port,$dbname,$user,$password) {
	
	global $modeacces, $connexion;
	
	if ($modeacces=="mysql") {
		@$link = mysql_connect("$host", "$user", "$password")
		or die("Impossible de se connecter au serveur : " . mysql_error());
		@$connexion = mysql_select_db("$dbname")
		or die("Impossible d'ouvrir la base : ".mysql_error());
		return $connexion;
	}

	if ($modeacces=="mysqli") {
		@$connexion = new mysqli("$host", "$user", "$password", "$dbname", $port);
		if ($connexion->connect_error) {
			die('Erreur de connexion (' . $connexion->connect_errno . ') '. $connexion->connect_error);
		}
		return $connexion;
	}

}

function deconnexion() {
	
	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		mysql_close();
	}

	if ($modeacces=="mysqli") {
		$connexion->close();
	}

}

function executeSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql)		
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysql_error().
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");		
		return $result;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql)		
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysqli_error_list($connexion)[0]['error'].      //$mysqli->error_list;
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");				
		return $result;
	}
}

function compteSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$num_rows = $connexion->affected_rows;
		return $num_rows;
	}

}

function tableSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$rows=array();
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$rows=array();
		while ($row = $result->fetch_array(MYSQLI_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

}

function champSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$rows = mysql_fetch_array($result, MYSQL_NUM);
		return $rows[0];
	}


	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$rows = $result->fetch_array(MYSQLI_NUM);
		return $rows[0];
	}

}



?>
