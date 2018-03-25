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

	<div class="container1" >
	
		
		<?php
			$id=$_SESSION['Pseudo'];
				$requete ="SELECT * FROM utilisateur where pseudo='$id'";
				$req= $bdd->query($requete);
				while ($ligne = $req ->fetch()){
				echo "<h1>Vos données : </h1>";
				echo "<img src=".$ligne['url']." width='30%'><br><br>";
				echo "Pseudo :".$ligne['pseudo'].'<br>';
				echo "Email : ".$ligne['email'].'<br>';
				echo 'Date de naissance : '.$ligne['date_naissance'].'<br>';
				echo 'Mot de passe : '.$ligne['mot_passe'].'<br>';
}  
$req -> closeCursor();


		?>




	</div>
</body>
</html>