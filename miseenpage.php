<?php
		session_start();



?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"	href="style.css"	type="text/css"	media="screen"	/>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	

</head>
	<body>

		
	<div class="menu">
	
	<video>
			
			<source src="images/back.mp4" type="video/mp4">

		</video>
		<?php
		
	if (isset($_SESSION['client'])) {

		echo "<p><a href='client.php'>Bienvenue  ".$_SESSION['Pseudo']."</a></p>";
		echo "<p><a href='index.php'>Acceuil</a></p>";
		
		echo "<p><a href='calendrier.php'>Calendrier</a></p>";
		echo "<p><a href='organiser.php'>Organiser un match</a></p>";
		echo "<p><a href='nouscontacter.php'>Nous contacter</a></p>";
		echo "<p><a href='deconnexion.php'>se déconnecter</a></p>";
	} else echo '

	<p><a href="index.php">Acceuil</a></p>
	<p><a href="calendrier.php">Calendrier</a></p>
	<p><a href="organiser.php">Organiser un match</a></p>
	<p><a href="enregistrer.php">Inscription</a></p>
	<p><a href="connecter.php">Se connecter</a></p>
	<p><a href="nouscontacter.php">Nous contacter</a></p>';

	?>
	
	</div>
	
</body>
</html>

