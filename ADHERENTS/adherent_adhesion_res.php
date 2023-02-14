  <?php session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 1;
  inc_entete($niveau_acces);
  ?>
		<?php
		//Lecture des données
		$nom=$_POST['nom'];
		$prenom=$_POST["prenom"];
		$classe=$_POST["classe"];
		$responsable_legal=$_POST["responsable_legal"];
		$titulaire_cheque=$_POST["titulaire_cheque"];
		$montant_adhesion=$_POST["montant_adhesion"];
		$moyen_paiement=$_POST["moyen_paiement"];

		if ($classe < 525 && $classe > 499)
			$niveau="Seconde";
		elseif ($classe < 680 && $classe > 599)
			$niveau="Premiere";
		elseif ($classe < 780 && $classe > 699)
			$niveau="Terminale";
		elseif ($classe < 815 && $classe > 799)
			$niveau="BTS_1";
		elseif ($classe < 915 && $classe > 899)
			$niveau="BTS_2";
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
		/*if (($titulaire_cheque =! null) && ($moyen_paiement != 'Cheque'))
		{
			print_r("<br><br>*** ERREUR : Moyen de paiement incohérent avec titulaire du chèque ***");
			echo "<p><a href='javascript:history.back()'>Retour à l'édition</a>";
			die();
		}*/

		//Conection BDD
		require('../inc/connectpdo.inc.php');
		$connexion=connectpdo();
		if (! $connexion) 	// ATTENTION! if !connexion*****************************************
		{
			echo '<p>### Connexion serveur impossible ###</p>';
			exit;
		}
		$requete="INSERT INTO `adherents`(`Nom`, `Prenom`, `Niveau`, `Classe`, `Responsable_legal`, `Titulaire_cheque`, `Montant_adhesion`, `Moyen_paiement`,`Horodatage`) VALUES ('$nom','$prenom','$niveau','$classe','$responsable_legal','$titulaire_cheque','$montant_adhesion','$moyen_paiement',SYSDATE())";
		$connexion->query($requete);
		$connexion=null;
		echo '<br><br><p>Adhérent inséré dans la Base De Données</p>';
		echo '<p><br><b>Nouvel adhérent : </b> <a href="adherent_adhesion.php">Suivez ce lien </a></p>';

		 ?>
	</body>
	<?php inc_foot(); ?>
</html>
