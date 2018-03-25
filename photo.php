<?php
include "miseenpage.php";
$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
$id=$_SESSION['Pseudo'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container1">
<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<p class="alerte">La taille du fichier ne doit pas depassée 2Mo !</p><br><input type="file" name="monfichier" /><br><br>
		<input class="bouton" type="submit" value="Enregistrer" >
	</form>
	<?php
		if ($_POST) {
	# code...

// Copie dans le repertoire du script avec un nom

	$ext=array('png','jpg','gif');
$repertoireDestination = dirname("C:/MAMP/htdocs/Projet/photo")."/";
$nomDestination        = "images/photo/".$id.".".$ext[2];
$url=$repertoireDestination.$nomDestination;

if (is_uploaded_file($_FILES["monfichier"]["tmp_name"])) {
    if (rename($_FILES["monfichier"]["tmp_name"],$url)) {

    		$requete2="UPDATE utilisateur SET url='$nomDestination' WHERE pseudo='$id'";
    		$rep = $bdd->query($requete2);
    		echo "Parfait !";
      
    } else {
        echo "Le déplacement du fichier temporaire a échoué".
                " vérifiez l'existence du répertoire ".$repertoireDestination;
    }          
} else {
    echo "<div class='alerte'>Le fichier n'a pas été uploadé (trop gros ?)</div>";
    echo '<META http-equiv="refresh" content="2; URL=photo.php">' ;
}
}
	?>
</div>


</body>
</html>