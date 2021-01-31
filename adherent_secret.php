<!DOCTYPE html>
<html>
    <head>
        <?php
          include('header_footer.php');
        ?>
        <center><p><FONT size="+3"><b>OUTILS DE GESTION : ADHÉRENTS</b></FONT></p></center>
    </head>
    <body style="background-color:#9BB2DA">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (isset($_POST['pvtab']) AND $_POST['pvtab'] ==  "mdp")
    {
    ?>
    <div>
        <FONT size="+2">
            <p><br><b>ADHÉSIONS : </b> <a href="adherent_adhesion.php">Suivez ce lien </a></p>
            <p><br><b>RECHERCHES D'ADHÉRENTS : </b> <a href="adherent_recherche.php">Suivez ce lien </a></p>
            <!--<p><br><b>RECHERCHES MANDAT MEMBRE ACTIF : </b> <a href="mandat.php"> Suivez ce lien </a></p>!-->
        </FONT>
    </div>

    <!-- INFORMATIONS GÉNÉRALES-->
    <FONT size="+2">
        <p><br>GÉNÉRATION PDF LISTE ADHÉRENTS : <a href="reboot_generation_pdf.php"> Suivez ce lien </a></p>
        <?php
        require('./connectpdo.inc.php');
        $connexion=connectpdo();
        if (! $connexion)
        {
            echo "### Connexion serveur impossible ###";
            exit;
        }
        $requete = "SELECT SUM(Montant_adhesion) FROM adherents WHERE 1";
        $resultat = $connexion->query($requete)->fetchColumn();
        //print_r($resultat->fetch(PDO::FETCH_NUM));
        //echo htmlentities($resultat, ENT_QUOTES, 'utf-8');
        echo '<center><br>Montant total des adhésions<br>';
        printf("--- %s€ ---", $resultat);
        echo '</center>';
        //echo '<pre>'.print_r($response,true).'</pre>';
        //print($reponse);
        //var_dump($reponse);
        //echo $resultat;
        ?>

    </FONT>
    <?php
    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>
    </body>
</html>
