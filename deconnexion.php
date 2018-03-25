

		<?php
	session_start();
	session_destroy();

	echo '<META http-equiv="refresh" content="1; URL=index.php">' ;
	function getIp()
{
$ip = ($ip = getenv('HTTP_FORWARDED_FOR')) ? $ip :
($ip = getenv('HTTP_X_FORWARDED_FOR'))     ? $ip :
($ip = getenv('HTTP_X_COMING_FROM'))       ? $ip :
($ip = getenv('HTTP_VIA'))                 ? $ip :
($ip = getenv('HTTP_XROXY_CONNECTION'))    ? $ip :
($ip = getenv('HTTP_CLIENT_IP'))           ? $ip :
($ip = getenv('REMOTE_ADDR'))              ? $ip :
'0.0.0.0';
return $ip;
}
$ip=getIp();
			$bdd = new PDO('mysql:host=localhost:8889;dbname=project_bdd;charset=utf8','root','root');
			$requete="INSERT INTO `visiteur` (adr_ip) VALUES ('$ip')";
			$rep=$bdd->query($requete);
?>
	