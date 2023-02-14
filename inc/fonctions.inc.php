<?php
function inc_head($title)
{
  echo "
  <!DOCTYPE html>
    <html lang='fr-fr'>
    <head>
      <title>".$title."</title>
      <meta charset='utf-8'/>
      <meta property='og:title' content='$title' />
      <meta property='og:type' content='website' />
      <link rel='icon' type='image/x-icon' href='/MDL_tools/img/LOGO_MDLred.PNG' />
      <link href='/MDL_tools/css/style.css' rel='stylesheet'/>
    </head>
    ";
}

function inc_foot()
{
  echo "
  <!--<div style=\"clear:both\"><br><br><br></div>!-->
  <footer>
    <p>MDL Tools : V1.1.3 - En developpement | Contact : <a href='mailto:grandmontmdl@gmail.com'>grandmontmdl@gmail.com</a></p>
  </footer>
  ";
}

function inc_entete($niveau_acces)
{
  if($_SESSION['identifiant']== "repair")
  {
    echo'
    <header class="entete">
    <img src="/MDL_tools/img/LOGO_MDLred.PNG"
      width="160"
      height="70">
      <a href="https://lycee-grandmont.fr"><img src="/MDL_tools/img/LogoLycee.png"
      align="right"
      width="100"
      height="90"></a>
      <div id="titre" align="center">
        <h1>MDL Tools - Grandmont</h1>
      
    <div id="user_actif" style="width:15%;float:right;margin-right: 5px">
    <p><strong>'.$_SESSION["identifiant"].'</strong> connecté</p>
    </div>
    </header>';
    inc_autorisation_page($niveau_acces);
  }
  else if($_SESSION['controle']==TRUE)
  {
    echo'
    <header class="entete">
    <img src="/MDL_tools/img/LOGO_MDLred.PNG"
      width="160"
      height="70">
      <a href="https://lycee-grandmont.fr"><img src="/MDL_tools/img/LogoLycee.png"
      align="right"
      width="100"
      height="90"></a>
      <div id="titre" align="center">
        <h1>MDL Tools - Grandmont</h1>
      </div>
      <div id="home" style="width:15%;float:left;margin-left: 5px">
      <a href="/MDL_tools/accueil.php">Retour à l\'accueil</a><br>
      </div>
    <div id="user_actif" style="width:15%;float:right;margin-right: 5px">
    <p><strong>'.$_SESSION["identifiant"].'</strong> connecté</p>
    </div>
    </header>';
    inc_autorisation_page($niveau_acces);
  }
  else
  {
    echo'
    <header class="entete">
    <img src="/MDL_tools/img/LOGO_MDLred.PNG"
      width="160"
      height="70">
      <img src="/MDL_tools/img/LogoLycee.png"
      align="right"
      width="100"
      height="90">
    <div id="titre" align="center">
        <h1>MDL Tools - Grandmont</h1>
      </div>
    <div id="user_actif" style="width:15%;float:right;margin-right: 5px">
      <p>Vous n\'êtes pas connecté</p>
    </div>
    </header>
    <body>';
  }
  $_SESSION['origine']=NULL;
}

function inc_autorisation_page($niveau_acces)
{
  if($_SESSION['niveau_acces'] < $niveau_acces)
  {
    //echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
    header("Location: /MDL_tools/accueil.php");
  }
}

function inc_test_connexion()
{
  session_start();
  if ((isset($_SESSION['controle'])) AND ($_SESSION['controle']==TRUE))
  {
  }
  else
  {
    //echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    header("Location: /MDL_tools/index.php");
    exit();
  }
}

function inc_verification_utilisateur()
{
  switch ($_SESSION["controle"]) {
    case FALSE:
    {
      if ($_SESSION["essai_connexion"]==TRUE)
      {
          echo "<script>alert(\"Connexion refusée\")</script>";
          $_SESSION["essai_connexion"]=FALSE;
      }
      break;
    }
    default:
      // code...
      break;
  }
}
function inc_montant_adhesions()
{
  require_once('inc/connectpdo.inc.php');
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
  echo 'Adhésions :<br>';
  printf("--- %s€ ---", $resultat);
}

function inc_archivage_DB()
{
  require_once("../inc/connectpdo.inc.php");
  $connexion = connectpdo();
  if (file_exists("../ADHERENTS/adherents.csv"))
  {
    unlink('../ADHERENTS/adherents.csv');
  }
  ## RPI ##
  $req = "SELECT * INTO OUTFILE '/var/www/html/MDL_tools/ADHERENTS/adherents.csv' CHARACTER SET utf8 FIELDS TERMINATED BY ';' ENCLOSED BY '\"'  LINES TERMINATED BY '\n' FROM adherents";
  ## WINDOWS ##
  //$req = "SELECT * INTO OUTFILE '../../htdocs/MDL_tools/ADHERENTS/adherents.csv' FIELDS TERMINATED BY ';' ENCLOSED BY '\"'  LINES TERMINATED BY '\n' FROM adherents";
  $connexion->query($req);
  echo "<br><br><a href='../ADHERENTS/adherents.csv' download='../ADHERENTS/adherents.csv'> Télécharger la sauvegarde des adhérents</a>";
}

function inc_nettoyage_DB()
{
  require_once("../inc/inc_connectpdo.inc.php");
  $connexion = connectpdo();
  $req = "DELETE FROM adherents WHERE 1";
}
?>
