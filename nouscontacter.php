<?php
include "miseenpage.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Nous contacter</title>
</head>
<body>

	<video  >
			
			<source src="images/back.mp4" type="video/mp4">

		</video>
	<div class="container1">
		
			<h1>Nous contacter</h1>
			

		<form action="" method="post">

           

            <p>Nom :<input id="name" name="name" type="text"></p>

        

            <p>Tél :

            <input id="tel" name="tel" type="tel"></p>

           

            <p>E-mail :

            <input id="email" name="email" type="email"></p>

           

            <p>Message :

            <textarea id="message" name="message"></textarea></p>

           

            <input type="submit" class="bouton" id="send" value="ENVOYER">     

        </form>
        <?php

					if($_POST) {
					$name = $_POST['name'];
					$tel = $_POST['tel'];
					$email = $_POST['email'];
					$message = $_POST ['message'];
					$to = "taleb.seifeddine@gmail.com";
					$subject = "Nouveau message";
					mail ($to, $subject, $message,"De:" .$name .$email);
						header($subject);
					    echo "<script>alert('Votre message a bien été envoyé.')</script>";
					   
					} 


?>

	</div>
</body>
</html>
