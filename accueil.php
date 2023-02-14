  <?php
  //session_start();
  require_once("inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 0;
  inc_entete($niveau_acces);
  ?>
    <section id="navigation" align="center" style="clear:both">
        <ul>
            <li><a href="">ADHÉRENTS</a>
                <ul>
                    <li><a href="ADHERENTS/adherent_adhesion.php">Adhésions</a></li>
                    <li><a href="ADHERENTS/adherent_recherche.php">Recherche</a></li>
                    <li><a href="ADHERENTS/generation_pdf.php">Génération PDF</a></li>
                    <li><a href=""><?php inc_montant_adhesions(); ?></a></li>
                </ul>
            </li>
            <li><a href="">K'FET</a>
                <ul>
                    <li><a href="KFET/">Inscriptions Bénévoles</a></li>
                    <li><a href="KFET/">Recherche</a></li>
                    <li><a href="KFET/">Génération PDF</a></li>
                </ul>
            </li>
            <li><a href="">FIN D'ANNÉE</a>
                <ul>
                    <li><a href="FIN_D_ANNEE/dl_db.php">Sauvegarde de la base de données</a></li>
                    <li><a href="FIN_D_ANNEE/">à venir</a></li>
                    <li><a href="FIN_D_ANNEE/">à venir</a></li>
                </ul>
            </li>
            <li><a href="">CLUEDO</a>
                <ul>
                    <li><a href="CLUEDO/cluedo_liste.php">Liste équipes</a></li>
                    <li><a href="CLUEDO/index.php">Enregistrement équipes</a></li>
                </ul>
            </li>
            <li><a href="inc/deconnexion.inc.php">Déconnexion</a></li>
        </ul>
    </section>
</body>
<?php inc_foot(); ?>
</html>
