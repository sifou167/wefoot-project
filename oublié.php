<?php

include "miseenpage.php";
$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mot de passe ??</title>
</head>
<body>
	<div class="container1">
		
		<form method="post">
			<p>Entrez votre adresse mail :<input type="mail" name="mail"></p>
			<p>Date de naissance :<input type="date" name="dd"></p>
			<input  class="bouton" type="submit" name="envoyer">
		</form>
		
<?php
if ($_POST) {
if (!empty($_POST['mail']) and !empty($_POST['dd'])) {
			$email=$_POST['mail'];
			$dd=$_POST['dd'];
			$req="SELECT * FROM `utilisateur` WHERE email='$email' and date_naissance='$dd'" ;
			$rep=$bdd->query($req);
			if ($ligne =$rep->fetch()){
				
				$mdp_genere = substr(sha1(uniqid()), rand(1,30),10);
				echo "<p>Un nouveau mot de passe a été crée !</p>
				<a href= 'connecter.php?mpxx=".$mdp_genere."'>Cliquez ici pour vous connecter</a>";
				$req2="UPDATE `utilisateur` SET `mot_passe`='$mdp_genere' WHERE email='$email' and date_naissance='$dd'";
				$rep2=$bdd->query($req2);
				
				}else echo "Indentifiant inconnu !!";

			}else echo "Veuillez remplir tous les champs !";
		}

?>

	</div>
</body>
</html>