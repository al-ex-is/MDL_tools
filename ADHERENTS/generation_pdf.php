  <?php session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 0;
  inc_entete($niveau_acces);
  ?>
		<?php
		/*if (isset($_POST['order_by']))
		{*/
			require_once('../inc/connectpdo.inc.php');
			$connexion=connectpdo();
			if (! $connexion)
			{
				echo "Connexion serveur impossible";
				exit;
			}
			$requete = "SELECT id,nom,prenom,niveau,responsable_legal,titulaire_cheque,montant_adhesion,moyen_paiement,classe FROM adherents ORDER BY classe, nom";
			$resultat = $connexion->query($requete);
			if ($resultat == null)
			{
				print_r($db->errorInfo());
				die();
			}
		##### TCPDF #####
			ob_start();
			ob_get_clean();
			require('../tcpdf/tcpdf.php');
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		### SETTER ###
			## INFORMATIONS ##
			$pdf->SetCreator('MDL Grandmont');
			$pdf->SetAuthor('MDL Grandmont');
			$pdf->SetTitle('Adherents MDL');
			$pdf->SetSubject('Listing adhérents');

			//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
			## MARGIN ##
			$pdf->SetMargins(PDF_MARGIN_LEFT, true, PDF_MARGIN_RIGHT);
			//$pdf->SetHeaderMargin(10);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			## AUTO PAGE BREAKS ##
			$pdf->SetAutoPageBreak(true, 20);
			## DEFFAULT FONT SUBSETTING ##
			$pdf->setFontSubsetting(true);
		### ENTÊTE ###
			$pdf->AddPage();
			//$pdf->Image('../img/LOGO_MDLred.png',5,5,35);
			//$pdf->Image('../img/LogoLycée.png',185,5,20);
			$pdf->SetFont('courierB','',30, '', true);
			$pdf->Text(50,7,"Liste des adherents");
			$pdf->SetFont('courier','I',13);
			$pdf->Text(86,18,"MDL Grandmont");
			$pdf->SetFont('courierB','',15, '', true);
			$pdf->Text(90,24,"2021-2022");
		### CONTENU ###
			$pdf->SetY(37,true);
			while($ligne = $resultat->fetch())
			{
				if($Y > 265)
				{
					$pdf->AddPage();
					$pdf->Write(8,"\n");
				}
				$pdf->SetTextColor(0,0,0);

				$pdf->SetFont('courier','B',13);
				$pdf->SetTextColor(26,35,255);
				$pdf->Write(7,strtoupper($ligne['nom'])." ");

				$pdf->SetFont('courier','',13);
				$pdf->Write(7,$ligne['prenom']);

				$pdf->SetTextColor(0,0,0);
				$pdf->Write(7," | ".$ligne['niveau']." ");
				$pdf->SetTextColor(196,21,28);
				$pdf->SetFont('courier','B',13);
				$pdf->Write(7,$ligne['classe']);
				$Y = $pdf->GetY();
				$pdf->Rect(150,$Y,50,7);
				$pdf->Write(7,"\n");
			}
		### GENERATION ###
			ob_get_clean();
			$pdf->Output("Liste_adherents.pdf",'D');
##### AFFICHAGE - REDEFINITION PAGE WEB (en cas d'option S) #####
			  /*require_once("../inc/fonctions.inc.php");
			  inc_test_connexion();
			  $title = "OUTILS MDL 2020-2021";
			  inc_head($title);
			  $niveau_acces = 0;
			  inc_entete($niveau_acces);*/

			echo "PDF Généré!";
			echo '<br><br><a href="/MDL_tools/ADHERENTS/Liste_adherents.pdf" target="_blank"> Cliquez ici pour le voir </a>';

		##### TFPDF #####
			/*require('../tfpdf/tfpdf.php');
			$pdf = new tFPDF(); // fonctionne aussi avec des paramètres (default [P,mm,A4]);
		### SETTER ###
			$pdf->SetTitle("Archive MDL",true);
		### ENTÊTE ###
			$pdf->AddPage();
			$pdf->Image('../img/LOGO_MDLred.png',5,5,35);
			$pdf->Image('../img/LogoLycée.png',185,5,20);
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
					$pdf->Write(7,"\n");
				}
		### GENERATION ###
			$pdf->Output("../ADHERENTS/Liste_adherents.pdf",'F',true);
			echo "PDF Généré!";
			echo '<br><br><a href="/MDL_tools/ADHERENTS/Liste_adherents.pdf" target="_blank"> Cliquez ici pour le voir </a>';*/
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
	<?php inc_foot(); ?>
</html>
