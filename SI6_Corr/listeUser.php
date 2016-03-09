<?php

	$sql="select * from user";
	$cptuser = compteSQL($connexion,$sql);
	$results = tableSQL($connexion,$sql);
	

	echo "<table id=\"affichetableau\">";
	echo "<thead>
			    <tr>
			    	<th>Num</th>
					<th>Login</th>
	    			<th>Email</th>
			    	<th><img src=\"images/edittitre16.png\" title=\"Modifier...\" /></th>
				    <th><img src=\"images/deletetitre16.png\" title=\"Supprimer...\" /></th>
	  		    </tr>
	          </thead>
	          <tbody>";
	
	
	$cpt=0;
	
	if ($cptuser>0) {
		foreach ($results as $ligne) {
			//on extrait chaque valeur de la ligne courante
			$numero = $ligne[0];
			$login = $ligne[1];
			$passwd = $ligne[2];
			$email = $ligne[3];
	

			$cpt++;
			if ($cpt %2 == 0) 
				echo "<tr class=\"even\">"; 
			else 
				echo "<tr class=\"odd\">";
				
			
			echo "<td width=\"15%\">".$numero."</td>";
		
			echo "<td width=\"25%\">".$login."</td>";
		
			echo "<td width=\"60%\">".$email."</td>";
		
			echo "<td width=\"32\"> <a href=\"frmModifieEmail.php?id=$numero\"> <img src=\"images/edit.png\" title=\"Modifier...\" /></a></td>";
		
			echo "<td width=\"32\"> <a href=\"supprime.php?id=$numero\"> <img src=\"images/delete.png\" title=\"Supprimer...\" /></a></td>";
		
		
			echo "</tr>";
		}
		
	} else {
		
		echo "<tr class=\"odd\">";
			
		echo "<td width=\"100%\">Aucune information...</td>";
		
		echo "</tr>";
		
	}
	
	
	
		echo "</tbody>
		</table> ";


?>