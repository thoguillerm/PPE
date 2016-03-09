<?php
include 'connectAD.php';

//on recupere les varirable issue du formulaire
$numero=$_GET['numero'];
$mail=$_GET['mail'];

$sql = "UPDATE user SET email ='".$mail."' WHERE numero = ".$numero;

$result = executeSQL($connexion,$sql);

if ($result)
	echo "<meta http-equiv='refresh' content='0;url=frmAfficheUser.php?message=<font color=green> Modification realisee </font>'>";
else
	echo "<meta http-equiv='refresh' content='0;url=frmAfficheUser.php?message=<font color=red> Probleme de modification... </font>'>";

?>