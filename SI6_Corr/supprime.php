<?php
	include 'connectAD.php';

	//on recupere les varirable issue du formulaire
	$numero=$_GET['id'];

	$sql = "DELETE FROM user WHERE numero=".$numero;

	$result = executeSQL($connexion,$sql);

 	if ($result)
            echo "<meta http-equiv='refresh' content='0;url=frmAfficheUser.php?message=<font color=green> Suppression realise... </font>'>";
        else
            echo "<meta http-equiv='refresh' content='0;url=frmAfficheUser.php?message=<font color=red> Probleme insertion... </font>'>";

		
?>