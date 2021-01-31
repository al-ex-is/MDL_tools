<!DOCTYPE html>
<html>
	<head>
		<?php
			include('header_footer.php');
		?>
	</head>
	<body style="background-color:#9BB2DA">
		<?php
		//Lecture des données
		$nom=$_POST['nom'];
		$prenom=$_POST["prenom"];
		$classe=$_POST["classe"];
		$mail=$_POST["mail"];
		$numero_telephone=$_POST["numero_telephone"];
		$responsable_legal=$_POST["responsable_legal"];
		$titulaire_cheque=$_POST["titulaire_cheque"];
		$montant_adhesion=$_POST["montant_adhesion"];
		$moyen_paiement=$_POST["moyen_paiement"];

		if ($classe < 525 && $classe > 499)
			$niveau="Seconde";
		elseif ($classe < 680 && $classe > 599)
			$niveau="Première";
		elseif ($classe < 780 && $classe > 699)
			$niveau="Terminale";
		elseif ($classe < 815 && $classe > 799)
			$niveau="BTS 1";
		elseif ($classe < 915 && $classe > 899)
			$niveau="BTS 2";
		else
		{
			print_r("*** Classe inexistante dans l'établissement ***");
			echo "<p><a href='javascript:history.back()'>Retour à l'édition</a>";
			die();
		}

		if ($montant_adhesion < 8)
		{
			print_r("*** MONTANT INCORRECT ***");
			echo "<p><a href='javascript:history.back()'>Retour à l'édition</a>";
			die();
		}

		//Conection BDD
		require('./connectpdo.inc.php');
		$connexion=connectpdo();
		echo '<h1>Base De Données : ADHÉRENTS</h1>';
		if (! $connexion) 	// ATTENTION! if !connexion*****************************************
		{
			echo '<p>### Connexion serveur impossible ###</p>';
			exit;
		}
		$requete="INSERT INTO `adherents`(`Nom`, `Prenom`, `Niveau`, `Classe`, `Mail`, `Numero_telephone`, `Responsable_legal`, `Titulaire_cheque`, `Montant_adhesion`, `Moyen_paiement`,`Horodatage`) VALUES ('$nom','$prenom','$niveau','$classe', '$mail','$numero_telephone','$responsable_legal','$titulaire_cheque','$montant_adhesion','$moyen_paiement',SYSDATE())";
		$connexion->query($requete);
		$connexion=null;
		echo '<p>Adhérent inséré dans la Base De Données</p>';
		echo '<p><br><b>Nouvel adhérent : </b> <a href="adherent_adhesion.php">Suivez ce lien </a></p>';

		 ?>
	</body>
</html>
