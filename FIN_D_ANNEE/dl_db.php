  <?php session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 1;
  inc_entete($niveau_acces);
  inc_archivage_DB(); 
  inc_foot();
?>
