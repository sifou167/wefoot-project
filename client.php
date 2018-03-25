<?php
	
	include "miseenpage.php";
	$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Votre profil</title>
</head>
<body>
		<div class="container">
			


				<?php

				if (isset($_SESSION['client'])) {

					echo '<h1>Votre calendrier '.$_SESSION['Pseudo'].'</h1>';
					echo '<h3>Vous avez organisé : </h3>';
				
					$requete="SELECT * FROM `listederencontres` WHERE `utili_id` =".$_SESSION['id'];
					$rep = $bdd->query($requete);
					
					
						echo"<table>
				<tr>
					<td>Terrain</td>
					<td>Date</td>
					<td>Heure</td>
					<td>Nombre de joueurs</td>
					
					
				</tr>";
				while ($ligne = $rep->fetch()) {
					if ($ligne['Nbr_joueurs']!=0) {
					
						echo "<td><a href= 'ajouter.php?Id_art=".$ligne['rencontre_id']."'>".$ligne ['rencontre_id']."</a></td>";
						echo "<td>".$ligne['Date']  ."</td>";
						echo "<td>".$ligne['Heure'] ."</td>";
						echo "<td>".$ligne['Nbr_joueurs'] ."</td></tr>";
						
				

					}else {$ligne['etat']=true ;
					    echo "<td><a href= 'ajouter.php?Id_art=".$ligne['rencontre_id']."'>".$ligne ['rencontre_id']."</a></td>";
						echo "<td>".$ligne['Date']  ."</td>";
						echo "<td>".$ligne['Heure'] ."</td>";
						echo "<td>Complet !</td></tr>";
						
						
					}
						}
						$rep -> closeCursor();
					
					echo "</table>";
					
					
					echo '<h3>Vos rencontres :</h3>';
			
				
					$requete2="SELECT a.InsNom, r.Date,r.Heure,r.Nbr_joueurs FROM listedejouers l, listederencontres r, etablissement a WHERE l.rencontre_id=r.rencontre_id and r.EquipementId=a.EquipementId and 
						l.utili_id=".$_SESSION['id'];
					$rep2 = $bdd->query($requete2);
					echo"<table><tr><td>Terrain</td>	<td>Date</td>	<td>Heure</td>	<td>Nombre de joueurs</td>	</tr>";
					while ($ligne2 = $rep2->fetch()) {
						echo "<td>".$ligne2['InsNom'] ."</td>";
						echo "<td>".$ligne2['Date']  ."</td>";
						echo "<td>".$ligne2['Heure'] ."</td>";
						echo "<td>".$ligne2['Nbr_joueurs']."</td></tr>";
					}
						
						echo "</table>";







				}
				?>
			

		</div>
</body>
</html>