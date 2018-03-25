<?php


include "miseenpage.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Organiser un match</title>
</head>
<body>
	
	<div class="container1">
	<h1>Recherche</h1>
	<form action="" method="post" >
		<label for="type">Veuillez choisir le type de terrain :</label>
		<select name="type">
			
			<option>Gazon</option>
			<option>Bitume</option>
			<option>Stabilisé</option>
			<option>Beton</option>

		</select><br><br>

		<label for="etat">Type d'établissemnt :</label>
		<select name="etat">
			
			<option>Public</option>
			<option>Privé</option>
			<option>Commune</option>
			<option>Département</option>
			<option>Région</option>
			<option>EPCI</option>
			

		</select><br><br>

		<label for="code">Département :</label>
		<select name="code">
			
			<option>Essonne</option>
			<option>Hauts-de-Seine</option>
			<option>Paris</option>
			<option>Seine-et-Marne</option>
			<option>Seine-Saint-Denis</option>
			<option>Val-d'Oise</option>
			<option>Val-de-Marne</option>
			<option>Yvelines</option>


		</select><br><br>
		
		

		<input type="submit" name="valider" value="Recherche" class="bouton">

	</form>
	</div>

	
		<?php

		$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');

		
		
	if ($_POST){
		echo '<div class="container">';

	 $type=$_POST['type'];
	 $etat=$_POST['etat'];
	 $code=$_POST['code'];

if (!empty($type)&!empty($etat)) {

	$requete="SELECT s.EquipementId, a.InsNom ,s.InsCodePostal, g.GestionTypeGestionnairePrincLib FROM etablissement a, adresse s, typesol p, gestion g WHERE a.EquipementId = s.EquipementId and s.EquipementId = p.EquipementId and p.EquipementId=g.EquipementId and p.Nature_du_sol LIKE '%$type%' and g.GestionTypeGestionnairePrincLib LIKE '%$etat%'
and a.Département ='$code'" ; 
	    $rep = $bdd->query($requete);

	    echo "<table><tr><td>Code Postal</td>
			    <td>Nom de l'etablissement</td>
			     <td>Type</td></tr>";
			    $i=0;
		while ($ligne = $rep->fetch()) {
				$i=$i+1;
				echo "<tr><td>".$ligne['InsCodePostal']."</td>";
			echo "<td><a href= 'terrain.php?Id_art=".$ligne['EquipementId']."'>".$ligne ['InsNom']."</a></td>";
			 echo "<td>".$ligne['GestionTypeGestionnairePrincLib']."</td></tr>";
		}
		 $rep -> closeCursor();
		 echo "<div class= alerte> Terrains disponibles : ".$i." </div>";
		 
		  echo "</table>";
	
} else {echo "<div class='alerte'>"."Veuillez remplir tous les champs !"."</div>";
				echo '<META http-equiv="refresh" content="1; URL=organiser.php">' ;}



}

?>

</body>
</html>