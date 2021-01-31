<!DOCTYPE html>
<html>
	<head>
		<?php
			include('header_footer.php');
		?>
		<center><p><FONT size="+3"><b>GÉNÉRATION PDF</b></FONT></p></center>
	</head>
	<body style="background-color:#9BB2DA">
		<?php
		/*if (isset($_POST['order_by']))
		{*/
			require('./connectpdo.inc.php');
			$connexion=connectpdo();
			if (! $connexion)
			{
				echo "Connexion serveur impossible";
				exit;
			}
			$requete = "SELECT id,nom,prenom,niveau,mail,numero_telephone,responsable_legal,titulaire_cheque,montant_adhesion,moyen_paiement,classe FROM adherents ORDER BY classe, nom";
			$resultat = $connexion->query($requete);
			if ($resultat == null)
			{
				print_r($db->errorInfo());
				die();
			}
			require('tfpdf/tfpdf.php');
			$pdf = new tFPDF(); // fonctionne aussi avec des paramètres (default [P,mm,A4]);
		### SETTER ###
			$pdf->SetTitle("Archive MDL",true);
		### ENTÊTE ###
			$pdf->AddPage();
			$pdf->Image('LOGO_MDLred.png',5,5,35);
			$pdf->Image('LogoLycée.png',185,5,20);
			$pdf->AddFont('Cour','','cour.ttf',true);
			$pdf->AddFont('Cour','B','courbd.ttf',true);
			$pdf->AddFont('Cour','BI','courbi.ttf',true);
			$pdf->AddFont('Cour','I','couri.ttf',true);
			$pdf->SetFont('Cour','B',30);
			$pdf->Text(50,20,"Liste des adherents");
			$pdf->SetFont('Cour','B',15);
			$pdf->Text(90,27,"2020-2021");
		### CONTENU ###
			$pdf->SetY(30,true);
			//if ($_POST['order_by'] == 'opt1')
			//{
				while($ligne = $resultat->fetch())
				{
					$pdf->SetTextColor(0,0,0);
					/*$pdf->SetFont('Cour','B',13);
					$pdf->Write(6,"ID : ");
					$pdf->SetFont('Cour','',13);
					$pdf->Write(6,$ligne['id']." ");*/

					$pdf->SetFont('Cour','B',13);
					$pdf->SetTextColor(26,35,255);
					$pdf->Write(6,strtoupper($ligne['nom'])." ");

					$pdf->SetFont('Cour','B',13);
					$pdf->Write(6,$ligne['prenom']);

					$pdf->SetFont('Cour','',13);
					$pdf->SetTextColor(0,0,0);
					$pdf->Write(6," | ".$ligne['niveau']." ");
					$pdf->SetTextColor(196,21,28);
					$pdf->SetFont('Cour','B',13);
					$pdf->Write(6,$ligne['classe']);
					$X = $pdf->GetX();
					$Y = $pdf->GetY();
					$pdf->Rect(150,$Y,50,7);

					/*$pdf->SetTextColor(0,0,0);

					$pdf->Write(6,"Mail : ");
					$pdf->SetFont('Cour','',13);
					$pdf->Write(6,$ligne['mail']." ");

					$pdf->SetFont('Cour','B',13);
					$pdf->Write(6,"Telephone : ");
					$pdf->SetFont('Cour','',13);
					$pdf->Write(7,$ligne['numero_telephone']." \n\n");*/
					$pdf->Write(7,"\n");
				}
			//}
			/*elseif ($_POST['order_by'] == 'opt2')
			{

			}*/

		### GENERATION ###
			$pdf->Output("Liste_adherents.pdf",'F',true);
			echo "PDF Généré!";
			echo '<br><br><a href="Liste_adherents.pdf" target="_blank"> Cliquez ici pour le voir </a>';
			$connexion=null;
		//}
		/*else
		{
			echo '<form method="post" action="reboot_generation_pdf.php" name="generation_pdf">
			<p><br>Tri des adhérents : <br><select name="order_by" id="order_by">
               <option value = "opt1">Identifiant</option>
               <option value = "opt2">Niveau</option>
               <option value = "opt3">Classe</option>
             </select>'; // Générer 4 pdf lors du tri par niveau ou par classe
             // AJOUTER UNE OPTION CASES POUR SIGNATURES ???
            echo '<p><br>Contenu du document PDF : <br><select name="content" id="content">
               <option value = "all">Toutes les infos disponibles</option>
               <option value = "contact">Nom.Prénom.Niveau.Classe.Mail.Telephone</option>
               <option value = "opt3">Tous, par niveau</option>
             </select>
			<center><input type="submit" name="boutonEnvoi" value="ENVOI"></center>
		</form>'; // REMPLACER LE TRI PAR NIVEAU -> TRI PAR CLASSE
		}*/
		?>
	</body>
</html>
