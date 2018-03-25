<?php
	include "miseenpage.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
	
</head>

<body>

	<video  >
			
			<source src="images/back.mp4" type="video/mp4">

		</video>
	<div class= "container1">
		
		<form action="" method="POST">
				<h1>Se connecter</h1>
				<h4>Votre email : <br><input type="email" name="mail" value=""></h4>
				<h4>Votre mot de passe :<br> <input type="password" name="motpasse" value="<?php if (isset($_GET['mpxx'])){echo $_GET['mpxx'];} ?>"></h4>
				<input type="submit" name="valider" title="Se connecter" class="bouton"><br><br>
				<a href="oublié.php">Mot de passe oublié ?</a>
		</form>		
<?php

	
	$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
	if ($_POST) {
		$email=$_POST["mail"];
		$password=$_POST["motpasse"];
		if ($email & $password) {
			# code...
		
		$rep = $bdd->query("select* from utilisateur where email='$email' and mot_passe='$password'"); 
		$ligne = $rep->fetch();
		
		if (!empty($ligne)) {
		$_SESSION['client']=true;
		$_SESSION['Pseudo']=$ligne['pseudo'];
		$_SESSION['id']=$ligne['utili_id'];
		echo '<META http-equiv="refresh" content="0; URL=index.php">';

		}else echo "<div class='alerte'>Identifiants Inconnus !</div>";
		

	}else echo "<div class='alerte'>Des champs sont vides !</div>";
	};
					
			
?>

	</div>
</body>
</html>

