<!DOCTYPE html>
<html>
<head>
	<title>QR Code - CLUEDO</title>
	<meta charset="utf-8">
</head>
<body style="background-color:#273746;color:white;font-family:Courier">
	<?php
		require('../inc/connectpdo.inc.php');
		$nom_equipe=$_POST['nom_equipe'];
		$connexion=connectpdo();
		if (! $connexion)
		{
			echo "### Connexion serveur impossible ###";
			exit;
		}
		$requete = "INSERT INTO cluedo(nom_equipe) VALUES(\"".$nom_equipe."\")";
		$resultat = $connexion->query($requete);
		if ($resultat == null)
		{
			print_r($db->errorInfo());
			die();
		}
		echo "Ton équipe est enregistrée!";
		$connexion = null;
	?>
</body>
</html>
