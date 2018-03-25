<?php

	include "miseenpage.php";
			
	?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"	href="style.css"	type="text/css"	media="screen"	/>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<body>

	<title>Acceuil</title>
	<video  >
			
			<source src="images/back.mp4" type="video/mp4">

		</video>
	<div class="container1">
		
		<?php
			
	
	
	if (isset($_SESSION['client'])) {

	echo "<h1>Bienvenue, ".$_SESSION['Pseudo']."</h1>";
	echo '<a href="profil.php">Votre profil</a><br>';;
	echo '<a href="client.php">Liste de rencontres sauvgardées</a><br>';
	echo '<a href="photo.php">Ajouter/modifier une photo de profil</a><br>';
	echo '<a href="modifier.php">Modifier votre mot de passe</a><br>';
	
	}

		else {
				echo"<h1>Bienvenue</h1>
			<h3>WeFoot &copy; application permettant de mettre en relation tous les joueurs de foot en Ile de France.</h3>
		
		<span> Projet L3 Licence - TALEB SEIF </span>
		</div>";}
		
	?>
</head>

</body>
</html>