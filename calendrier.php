<?php
	
	include "miseenpage.php";
	$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Calendrier</title>
</head>
<body>
		<div class="container">
			<h1>Calendrier des rencontres</h1>
		


				<?php

					$requete="SELECT * FROM listederencontres r, adresse s WHERE s.EquipementId=r.EquipementId";
					$rep = $bdd->query($requete);
					$i=0;
					if (isset($_SESSION['client'])) {
						echo'	<table>
				<tr>
					<td>Choix</td>
					<td>Terrain</td>
					<td>Date</td>
					<td>Heure</td>
					<td>Nombre de place dispo</td>
					<td>Adresse</td>
					<td>Message de l"organisateur </td>

				</tr>';
					while ($ligne = $rep->fetch()) {
						if ($ligne['Nbr_joueurs']!=0) {
						
						$i=$i+1;
						echo "<tr><td><a href= 'ajouter.php?Id_art=".$ligne['rencontre_id']."'>Select</a></td>";
						echo "<td><a href= 'ajouter.php?Id_art=".$ligne['rencontre_id']."'>".$ligne ['rencontre_id']."</a></td>";
						echo "<td>".$ligne['Date']  ."</td>";
						echo "<td>".$ligne['Heure'] ."</td>";
						echo "<td>".$ligne['Nbr_joueurs'] ."</td>";
						echo "<td>".$ligne['InsNoVoie'] ."  ".$ligne['InsLibelleVoie']." ".$ligne['InsCodePostal']."</td>";
						echo "<td>".$ligne['message'] ."</td></tr>";
						} else { $ligne['etat']=true ;
						echo "<tr><td>SELECT</td>";
					    echo "<td>".$ligne['rencontre_id']."</td>";
						echo "<td>".$ligne['Date']  ."</td>";
						echo "<td>".$ligne['Heure'] ."</td>";
						echo "<td>Complet !</td>";
						echo "<td>".$ligne['InsNoVoie'] ."  ".$ligne['InsLibelleVoie']." ".$ligne['InsCodePostal']."</td>";
						echo "<td>".$ligne['message'] ."</td></tr>";}

								}  $rep -> closeCursor();
					echo "Rencontres dispo :" .$i;

						}else echo '<div class="alerte" >Veuillez vous connecter pour acceder au Calendrier !</div>';
				?>
			</table>




		</div>
</body>
</html>