<!--<body style="background-color:#FF2B40">!-->
  <?php
  //session_start();
  require_once("../inc/fonctions.inc.php");
  inc_test_connexion();
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 0;
  inc_entete($niveau_acces);
  ?>

  <?php
    require ("../inc/connectpdo.inc.php");
    $connexion=connectpdo();
    if (! $connexion)
    {
      print_r($db->errorInfo());
      die();
    }
    echo "<b>Vous êtes sur le point de réinitialiser la base de données, cette opération est IRRÉVERSIBLE !</b>";
    //require ("./ope_db.php");
    //$rn_table=rename_table($connexion);
    ?>
    <!--<form method="post" name='table_name'>
      <p>Classe : <input type="text" name='table_name' maxlength="32" required="Obligatoire"></p>
      <input type="submit" name="envoyer" value="envoyer" onclick=<?php rename_table($connexion)?>>
    </form>!-->
</body>
<?php inc_foot(); ?>
</html>
