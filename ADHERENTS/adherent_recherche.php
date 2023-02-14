  <?php session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 0;
  inc_entete($niveau_acces);
  ?>

	<?php
		if (isset($_POST['nom']))
		{
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			//$classe=$_POST['classe'];
			$order_by=$_POST['order_by'];
			echo "<br><br><br>Recherche des adhérents : $nom $prenom<br>";
			require('../inc/connectpdo.inc.php');
			$connexion=connectpdo();
			if (! $connexion)
			{
				echo "### Connexion serveur impossible ###";
				exit;
			}
			$requete = "SELECT id,nom,prenom,niveau,classe,montant_adhesion,moyen_paiement FROM adherents WHERE nom LIKE '%$nom%' AND prenom LIKE '%$prenom%' ORDER BY $order_by /*ASC*/";/*AND classe LIKE '%$classe%'*/
			$resultat = $connexion->query($requete);
			if ($resultat == null)
			{
				print_r($db->errorInfo());
				die();
			}
			echo '<p><a href="adherent_recherche.php">########## Nouvelle Recherche ##########</a></p>';
			// Parcours des resultats ligne par ligne
			while($ligne = $resultat->fetch())
			{
				echo "<br>----------------------------------------------------<br>";
				echo "ID : ".$ligne['id']."<br>";
				if ($ligne['classe'] == "")
				{
					echo strtoupper($ligne['nom'])." ".$ligne['prenom']." ; ".$ligne['niveau']."<br>".$ligne['montant_adhesion']."€, via ".$ligne['moyen_paiement'];
				}
				elseif ($ligne['classe'] != "")
				{
					echo strtoupper($ligne['nom'])." ".$ligne['prenom']." ; ".$ligne['classe']."<br>".$ligne['montant_adhesion']."€, via ".$ligne['moyen_paiement'];
				}
				// CA BUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUGGGGG!!!!!!!!!!!!!!!! (plus XD )
			}
			echo "<br><br>";
			$connexion = null;
		}
		else
		{
			echo '<br><br><p>Entrez les informations correspondantes :</p>
		<form method="post" action="adherent_recherche.php" name="rechercheADHERENT">
			<p>Nom : <input type="text" name="nom" size="32"> Prenom : <input type="text" name="prenom" size="32"> <!-- Classe : <input type="text" name="classe" size="3"> !-->
			<p><br>Trier par : <br><select name="order_by" id="order_by">
               <option value = "ID">ID</option>
               <option value = "nom">Nom</option>
               <option value = "classe,nom">Classe</option>
             </select>
			<center><input type="submit" name="boutonEnvoi" value="RECHERCHER"></center>
		</form>'; // REMPLACER LE TRI PAR NIVEAU -> TRI PAR CLASSE
		}
	?>
</body>
<?php inc_foot(); ?>
</html>
