
<?php
	

	include "miseenpage.php";

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Resultat</title>
	
<body>
	<?php


$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
			
		echo '<div class="container1">';

		
		

		if (isset($_SESSION['client'])) {

				
			$requete="SELECT s.id, a.InsNom, s.InsNoVoie, s.InsLibelleVoie, s.InsCodePostal, p.Nature_du_sol FROM etablissement a, adresse s, typesol p WHERE a.EquipementId = s.EquipementId and s.EquipementId = p.EquipementId and s.EquipementId=".$_GET['Id_art']; 
			$rep=$bdd->query($requete);
			$ligne =$rep->fetch();

	 		 echo '<table><tr>
			<td>N° voie</td><td>Rue</td>
			<td>Code postal</td>
			<td>Nature du sol</td></tr>
			';

			 echo '<tr>';
			 echo "<td>". $ligne['InsNoVoie']."</td>";
			 echo "<td>". $ligne['InsLibelleVoie']."</td>";
			 echo "<td>". $ligne['InsCodePostal']."</td>";
			 echo "<td>". $ligne['Nature_du_sol']."</td></tr>";
			

			

			echo "</table>";
			echo '<form action="terrain1.php" method="post"><td><input type ="hidden" name="id" value="'.$_GET['Id_art'].'"></td><p>Nombre de joueurs: <input type="number" name="nbr"></p><p>Heure : <input type="time" name="hh"></p><p>Date : <input type="date" name="dd"></p><p> laisser un message : <textarea type="" name="msg"></textarea></p>
			 <input class="bouton" type="submit" value="Enregistrer"></form>';
			echo "</div>";

		} else {echo '<div class="alerte">Veuillez vous connecter !</div>';
		echo '<META http-equiv="refresh" content="2; URL=connecter.php">' ;}

			

?>

	
   
	
	</body>
	</html>
