<?php
	
	
	include "miseenpage.php";

					 $id=$_SESSION['id'];  #organisateur id
					 $code=$_POST['id'];  #terrain 
					 $date=$_POST['dd'];
					 $heure=$_POST['hh'];
					 $joueur=$_POST['nbr'];
					 $msg=$_POST['msg'];

$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');

					function enregistrer ($c,$id, $d, $h, $nbr,$m){
						$n=$nbr-1;
					$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
					$sql= "INSERT INTO `listederencontres`(`EquipementId`, `utili_id`, `Date`, `Heure`, `Nbr_joueurs`, 'message') VALUES ('$c','$id', '$d', '$h','$n','$m')";
					$bdd->exec($sql);
					echo '<div class="alerte" >La rencontre à été ajouter avec succes !</div>';

				}



					function Inlistejoueur($d,$h,$c){
						$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
						$req2="SELECT * FROM `listederencontres` WHERE `Date`='$d' and `Heure`='$h' and `EquipementId`='$c'";
							$rep2= $bdd->query($req2);
							$ligne = $rep2->fetch();
							return  $ligne['rencontre_id'];

					}
		echo '<div class="container1">';
				if (!empty($joueur)and !empty($heure)and !empty($date)) {
					if ($joueur<=10) {
							$req="SELECT * FROM `listederencontres` WHERE `Date`='$date' and `Heure`='$heure' and `EquipementId`='$code'";
							$rep = $bdd->query($req);
							if (empty($ligne = $rep->fetch())) {
								
							enregistrer($code,$id,$date,$heure,$joueur,$msg);
							$renc=Inlistejoueur($date,$heure,$code);
							
							$req1="INSERT INTO `listedejouers`(`rencontre_id`, `utili_id`) VALUES ($renc,$id)";
							$rep1 = $bdd->query($req1);
							echo '<META http-equiv="refresh" content="1; URL=index.php">' ;

							}else echo '<div class="alerte" >Ce créneau est déja reservé !, Veuillez changer heure </div>';
									echo '<META http-equiv="refresh" content="1; URL=organiser.php">' ;
					}else echo '<div class="alerte" >Nombre des joueurs ne doit depassé 10 !</div>';
				}else echo '<div class="alerte" >Des champs sont vides !</div>';
						echo '<META http-equiv="refresh" content="1; URL=organiser.php">' ;
				echo "</div>";
?>