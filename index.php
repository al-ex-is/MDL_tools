	<?php
  session_start();
  if(!isset($_SESSION['controle']))
  {
    $_SESSION['controle']= FALSE;
  }
  if(!isset($_SESSION['essai_connexion']))
  {
    $_SESSION['essai_connexion']= FALSE;
  }
  require("inc/fonctions.inc.php");
  $title = "OUTILS MDL 2020-2021";
  inc_head($title);
  $niveau_acces = 0;
  inc_entete($niveau_acces);
  ?>


<body style="background-color:#9BB2DA">
	<section class="identification">
    <h2>Connectez-vous</h2>
    <div id="connexion">
      <form name="form_connexion" method="post" action="inc/acces.inc.php">
        <p>Identifiant : </p>
        <input type="text" name="login" maxlength="32" required="Obligatoire">
        <p>Mot de passe : </p>
        <input type="password" name="mdp" maxlength="32" required="Obligatoire">
        <input type="submit" value="Connexion">
      </form>
    </div>
    <?php
    inc_verification_utilisateur();
    /*

    if((isset($_SESSION['controle']))AND($_SESSION['controle']==FALSE))
    {
      echo "<script>alert(\"Connexion refusée\")</script>";
    }*/
    ?>
  </section>
</body>
<?php inc_foot()?>
</html>
