  <?php session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 1;
  inc_entete($niveau_acces);
  ?>
		<center>
		<h2>Veuillez saisir les informations suivantes :</h2>
		<form method="post" action="adherent_adhesion_res.php" name="adhesion">
			<p>Nom : <input type="text" name="nom" maxlength="32" required="Obligatoire"> Prénom : <input type="text" name="prenom" maxlength="32" required="Obligatoire">
	    <p>Classe : <input type="text" name="classe" maxlength="3" required="Obligatoire"></p>
			<p><br>Nom et prénom du responsable légal : <input type="text" name="responsable_legal" maxlength="64"> Titulaire du chèque : <input type="text" name="titulaire_cheque" maxlength="64">
			<p><br><br>Montant de l'adhésion : <input type="text" name="montant_adhesion" maxlength="4" required="Obligatoire">
			Moyen de paiement : <select name="moyen_paiement" id="moyen_paiement">
				<option value = "Cheque">Chèque</option>
				<option value = "Espece">Espèce</option>
				<option value = "CB">CB</option>
	        </select>
	        <br><br><br><br> ----- <input type="submit" value="Envoyer" name="envoyer" align="right"> ----- </center>
	    </form>
	</body>
	<?php inc_foot(); ?>
</html>
