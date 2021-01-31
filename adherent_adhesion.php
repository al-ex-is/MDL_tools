<!DOCTYPE html>
<html>
	<head>
		<?php
			include('header_footer.php');
		?>
		<center><h1><FONT size="+3"><b>ADHÉSIONS MDL</b></FONT></h1></center>
	</head>
	<body style="background-color:#9BB2DA">
		<center>
		<h2>Veuillez saisir les informations suivantes :</h2>
		<form method="post" action="adherent_adhesion_res.php" name="adhesion">
			<p>Nom : <input type="text" name="nom" maxlength="32" required="Obligatoire"> Prénom : <input type="text" name="prenom" maxlength="32" required="Obligatoire">
	    <p>Classe : <input type="text" name="classe" maxlength="3" required="Obligatoire"></p>
			<p><br>Adresse mail : <input type="text" name="mail" maxlength="32"> Numéro de téléphone : <input type="text" name="numero_telephone" maxlength="10">
			<p><br><br>Nom et prénom du responsable légal : <input type="text" name="responsable_legal" maxlength="64"> Titulaire du chèque : <input type="text" name="titulaire_cheque" maxlength="64">
			<p><br><br>Montant de l'adhésion : <input type="text" name="montant_adhesion" maxlength="4" required="Obligatoire">
			Moyen de paiement : <select name="moyen_paiement" id="moyen_paiement">
				<option value = "Chèque">Chèque</option>
				<option value = "Espèce">Espèce</option>
				<option value = "CB">CB</option>
	        </select>
	        <br><br><br><br> ----- <input type="submit" value="Envoyer" name="envoyer" align="right"> ----- </center>
	    </form>
	</body>
</html>
