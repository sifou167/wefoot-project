<?php
	include "miseenpage.php";
	$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier</title>
</head>
<body>
	<div class="container1">
		
		<form method="post" action="">
			<p>Entrez votre adresse mail :<input type="mail" name="mail"></p>
			<p>Votre nouveau mot de passe:<input type="password" name="dd"></p>
			<p>Confirmez votre mot de passe:<input type="password" name="dd1"></p>
			<input class="bouton" type="submit" name="envoyer">
		</form>
<?php

if($_POST){
if (!empty($_POST['mail']) and !empty($_POST['dd'])) {
			$email=$_POST['mail'];
			$dd=$_POST['dd'];
			$dd1=$_POST['dd1'];
			$req="SELECT * FROM `utilisateur` WHERE email='$email'";
			$rep=$bdd->query($req);
			$ligne = $rep->fetch();
			if(!empty($ligne)){
			
		if ($dd1==$dd) {
			
				$req2="UPDATE `utilisateur` SET `mot_passe`='$dd' WHERE email='$email'";
				$rep2=$bdd->query($req2);
				echo "Mot de passe enregistré !";
				echo '<META http-equiv="refresh" content="3; URL=index.php">' ;
			}else {echo "<div class='alerte'>Les mots de passe ne sont pas identiques !</div>";}
				
		}else echo "<div class='alerte'>Adresse mail inconnu !</div>";
			}else echo "<div class='alerte'>Veuillez remplir tous les champs !</div>";
		}


?>


	</div>
</body>
</html>