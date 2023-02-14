<!DOCTYPE html>
<html>
<head>
	<title>EQUIPES CLUEDO</title>
	<meta charset="utf-8">
</head>
<body style="background-color:#273746;color:white;font-family:Courier">
	<center><p><FONT size="+3"><b>LISTE EQUIPES CLUEDO (QR CODE)</b></FONT></p></center>
	<?php
		require('../inc/connectpdo.inc.php');
		$connexion=connectpdo();
		if (! $connexion)
		{
			echo "### Connexion serveur impossible ###";
			exit;
		}
		$requete = "SELECT * FROM cluedo";
		$resultat = $connexion->query($requete);
		if ($resultat == null)
		{
			print_r($db->errorInfo());
			die();
		}
		while($ligne = $resultat->fetch())
		{
			echo "<br>----------------------------------------------------<br>";
			echo "Équipe : ".$ligne['nom_equipe']."<br>";
		}
		$connexion = null;
	?>
</body>
</html>
