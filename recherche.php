<?php

include "miseenpage.php";



$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');

	
	 $type=$_POST['type'];
	 $date=$_POST['dd'];
	 $code=$_POST['code'];

if (!empty($type)&!empty($code)) {

	$requete="SELECT s.id, a.InsNom, s.InsNoVoie, s.InsLibelleVoie, s.InsCodePostal, p.Nature_du_sol FROM etablissement a, adresse s, typesol p WHERE a.EquipementId = s.EquipementId and s.EquipementId = p.EquipementId and p.Nature_du_sol LIKE '%$type%' and s.InsCodePostal ='$code'"; 
	    $rep = $bdd->query($requete);

	    echo "<table><tr><td>Code</td>
			    <td>Nom de l'etablissement</td></tr>";
			   
			    $i=0;
		while ($ligne = $rep->fetch()) {
				$i=$i+1;
				echo "<tr><td>".$ligne['id']."</td>";
			echo "<td><a href= 'terrain.php?Id_art=".$ligne['id']."'>".$ligne ['InsNom']."</a></td></tr>";
			 
		}
		 $rep -> closeCursor();
		 echo "<div class= alerte> N° de terrains trouvés :".$i."</div>";
		 
		  echo "</table>";
	
} else {echo "<div class='alerte'>"."Veuillez remplir tous les champs !"."</div>";
				echo '<META http-equiv="refresh" content="2; URL=organiser.php">' ;}



?>