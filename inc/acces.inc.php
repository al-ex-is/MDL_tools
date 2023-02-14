<?php
session_start();
$id_session = $_POST["login"];
$mdp_session = md5($_POST["mdp"]);

require('connectpdo.inc.php');
echo "essai1";
$connexion = connectpdo();
echo "essai2";
$req = "SELECT * FROM utilisateurs WHERE identifiant='$id_session' AND motdepasse='$mdp_session'";
$reponse = $connexion->query($req);
if($reponse == null)
{
  print_r($db -> errorInfo());
  die();
}
else
{
  if ($ligne = $reponse->fetch())
  {
    $_SESSION["controle"] = TRUE;
    $_SESSION["identifiant"] = $id_session;
    $_SESSION["mot_de_passe"] = $mdp_session;
    $_SESSION["niveau_acces"] = $ligne['role'];
    if ($_SESSION['identifiant'] == "repair")
    {
      header("Location: ../repairclub.php");
    }
    else
    {
      header("Location: ../accueil.php");
    }
  }
  else
  {
    //echo "Connexion impossible";
    $_SESSION["controle"] = FALSE;
    $_SESSION["essai_connexion"] = TRUE;
    $_SESSION["identifiant"] = null;
    $_SESSION["mot_de_passe"] = null;
    header("Location: ../index.php");
  }
}
?>
