<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>
	<?php
		include 'head.php';
	?>
</head>

<body>

  <?php

	include 'connectAD.php';
	
	include 'frmInsertUser.php';
	
	include 'tableauErreur.php';	
	
	include 'listeUser.php';
  	
  ?>

 		<form id="modifmail" action="modifieMail.php" method="get">
	 		<table>
	 			<tr>
	 				<td>
	 					<b>NOUVELLE ADRESSE MAIL : </b>
	 				</td>
	 				<td>
	 					<input id="mail" name="mail" type="text" value="<?php 
	 																				$numero = $_GET['id'];
	 					
	 																				$sql = "SELECT email FROM user WHERE numero=".$numero;
	 																				$email = champSQL($connexion,$sql);
	 																				
	 																				echo $email;
	 													 						?>" size="20" maxlength="20"/>
	 				</td>
	 				<td>
	 				  	<input id="envoyer" name="envoyer" type="submit" value="Modifier" title="" />
	 				</td>
	 				<td>
	 					<input id="numero" size="1" name="numero"value="<?php $numero = $_GET['id']; echo $numero; ?>"/>
	 				</td>
	 			</tr>
	 		</table>
  		</form>
 

</body>
</html>