<?php

include 'connectAD.php';

$creations ="";
$insertions="\n\n";

$sql = "show tables";
$results = tableSQL($connexion,$sql);

foreach ($results as $ligne) {
	//on extrait chaque valeur de la ligne courante
	$table = $ligne[0];
	
	
	// structure de la table
	$creations .= "-- -----------------------------\n";
	$creations .= "-- Structure de la table ".$table."\n";
	$creations .= "-- -----------------------------\n";
	
	$sql1="show create table ".$table;	
	$results1 = tableSQL($connexion,$sql1);
	
	foreach ($results1 as $ligne1) {
		//on extrait chaque valeur de la ligne courante
		$requete = $ligne1[1];
	
		//on affiche la requete
	    $creations .= $requete.";\n\n";	    		
	}
	
	
	// donnees de la table
	$sql2 = "SELECT * FROM ".$table;
	$results2 = tableSQL($connexion,$sql2);

	$insertions .= "-- -----------------------------\n";
	$insertions .= "-- Contenu de la table ".$table."\n";
	$insertions .= "-- -----------------------------\n";
	
	foreach ($results2 as $ligne2) {
		
		$nombredechamps = nombrechamp($sql2);
			
		$insertions .= "INSERT INTO ".$table." VALUES(";
		
		for($i=0; $i <$nombredechamps; $i++) {
					
			$letypeduchamp = typechamp($sql2,$i);
			$lavaleurduchamp =  $ligne2[$i];
			
			if($i != 0)
				$insertions .=  ", ";
			
			if($letypeduchamp == "string" || $letypeduchamp == "blob")
				$insertions .=  "'";
			
			$insertions .= addslashes($lavaleurduchamp);
			
			if($letypeduchamp == "string" ||$letypeduchamp == "blob")
				$insertions .=  "'";					
		}
		
		$insertions .=  ");\n";
		
	}
	
	$insertions .= "\n";
		
}


deconnexion();


$fichierDump = fopen($dbname.".sql", "w");
	fwrite($fichierDump, $creations);
	echo "Structure de la base $dbname sauvegardee...<br />";
	fwrite($fichierDump, $insertions);
	echo "Donnees de la base $dbname sauvegardee...<br />";
fclose($fichierDump);



?>	