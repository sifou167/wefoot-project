<?php
	include "miseenpage.php";

	$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter</title>
</head>
<body>
		<div class="container1">
			<h1>Vous avez choisi :</h1>
			<table>
				<tr>
					<td>Terrain</td>
					<td>Date</td>
					<td>Heure</td>
					<td>Nombre de place dispo</td>
					<td>Adresse</td>

				</tr>


<?php
				
					
				 $id=$_GET['Id_art'];
				 $nbr=0;
				 $uid=0; /* le mec qui a crée la rencontre */
	$requete="SELECT * FROM listederencontres r, adresse s WHERE s.EquipementId=r.EquipementId and r.rencontre_id='$id'";
					$rep = $bdd->query($requete);
					$ligne = $rep->fetch();
					$nbr=$ligne['Nbr_joueurs']; 
						$uid=$ligne['utili_id'];
						echo "<tr><td>".$ligne['rencontre_id']."</td>";
						echo "<td>".$ligne['Date']."</td>";
						echo "<td>".$ligne['Heure']."</td>";
						echo "<td>".$nbr."</td>";
						echo "<td>".$ligne['InsNoVoie'] ."  ".$ligne['InsLibelleVoie']." ".$ligne['InsCodePostal']."</td></tr>";
					
				
?>
	</table>

					<form action="" method="post">
				<input class="bouton" type="submit" name="Enregistrer" value="Jouer">
			</form>
					<?php

					if (!empty($_POST)) {
						# valider le bouton 
					
							
								
								if ($uid!==$_SESSION['id']) {/*si le joueur n'est pas l'organisateur */
									
								$jid=$_SESSION['id'];
									$requete2="SELECT `rencontre_id`, `utili_id` FROM `listedejouers` WHERE `rencontre_id`='$id' and `utili_id`='$jid'"; /*je verifie si pas de doublons dans la base listejoeurs */

									$rep2 = $bdd->query($requete2);
									
										if (empty($ligne3 = $rep2->fetch())) {  /*si pas de doublons */

											$requete1="INSERT INTO `listedejouers`(`rencontre_id`, `utili_id`) VALUES ('$id','$jid')  ";
											$rep1 = $bdd->query($requete1); /*on ajoute dans la base le joueurs et l'organisateurs*/

											$nbr=$ligne['Nbr_joueurs']-1; /*on met a jour le nombre de joueurs restant  */
											$requete3="UPDATE `listederencontres` SET `Nbr_joueurs`='$nbr' WHERE `rencontre_id`='$id' and `utili_id`='$uid'";
											$rep3 = $bdd->query($requete3);
											$ligne3 = $rep->fetch();
											
												echo "Bien joué !";
												echo '<META http-equiv="refresh" content="1; URL=calendrier.php">' ;
											
										}else 
										{echo "<div class='alerte'>Vous faites deja partie des joueurs de ce match !</div>";
									echo '<META http-equiv="refresh" content="1; URL=calendrier.php">' ;}
										

								
								} else echo "<div class='alerte'>Vous etes l'organisateur du match !<div>";
								echo '<META http-equiv="refresh" content="1; URL=calendrier.php">' ;
							

						} 



						echo "<h2>Liste des joueurs </h2>";
						$requetex="SELECT * FROM listedejouers l, utilisateur u WHERE l.utili_id=u.utili_id and l.rencontre_id=".$id;
						$repx = $bdd->query($requetex);
						while ($lignex = $repx->fetch()){
						echo "<ul><li>".$lignex['pseudo'].": ".$lignex['email']."</li></ul>";

						}
						$rep -> closeCursor();
					?>



		</div>
</body>
</html>