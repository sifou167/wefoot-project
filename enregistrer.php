<?php
include "miseenpage.php";
$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root'); 


?>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<video  >
			
			<source src="images/back.mp4" type="video/mp4">

		</video>
<div class="container1">
		
			<h1>Inscription</h1>
					<form action="" method= "POST">
						<h4>Votre pseudo :<br><input type="text" name="username"></h4>
						<h4>Votre email :<br><input type="email" name="mail"></h4>
						<h4>Votre date de naissance :<br><input type="date" name="datenaissance"></h4>
						<h4>Votre mot de passe  :<br><input type="password" name="motpasse"></h4>
						<h4>Veuillez confirmer votre mot de passe :<br><input type="password" name="motpasseconfirmé"></h4>
						<input type="submit" name="envoyer" class="bouton">
					</form>
					<?php
							if ($_POST){
	
	$username= $_POST['username'];
	$email=$_POST['mail'];
	$date=$_POST['datenaissance'];
	$password=$_POST['motpasse'];
	$repeatpassword=$_POST['motpasseconfirmé'];
	if ($username and $email and $password and $repeatpassword and $date) {
		if ($password==$repeatpassword) {
			$sql= "INSERT INTO utilisateur VALUES ('','$username','$email','$date','$password')";
			$bdd->exec($sql);
				echo "<div class='alerte'>"."Données enregistrées !"."</div>";

		}else echo "<div class='alerte'>"."Mot de passe erroné !"."</div>";
		
	}else echo "<div class='alerte'>"."Veuillez remplir tous les champs !"."</div>";
	
	 			
}
					?>
		
</div>				
</body>
</html>
