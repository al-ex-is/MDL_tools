<!DOCTYPE html>
<html>
  <head>
    <?php
  		include('header_footer.php');
  	?>
  </head>
  <body style="background-color:#91FFA1">
    <p>Veuillez entrer le mot de passe pour accéder aux site de la MDL :</p>
    <form action="adherent_secret.php" method="post">
      <p>
      <input type="password" name="pvtab" />
      <input type="submit" value="Valider" />
      </p>
    </form>
    <p>Cette page est réservée aux membres du bureau de la MDL du Lycée Grandmont (Tours, France)</p>
    <p>Besoin d'aide ? Need help ? Contact : <a href="mailto:grandmontmdl@gmail.com"> grandmontmdl@gmail.com</a></p>
  </body>
</html>
