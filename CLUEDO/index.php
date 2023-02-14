<!DOCTYPE html>
<html>
<head>
  <title>QR Code - CLUEDO</title>
  <meta charset="utf-8">
</head>
<body style="background-color:#273746;color:white;font-family:Courier">
  <center><p><FONT size="+3"><b>CLUEDO - 02/06/2021</b></FONT></p></center>
    <div id="connexion">
      <p>BRAVO! Tu as trouvé le QR Code! Enregistre ton équipe pour avoir des points supplémentaires!</p>
      <h2>Entrez votre nom d'équipe</h2>
      <form name="form_nom_equipe" method="post" action="enregistrement.php">
        <input type="text" name="nom_equipe" maxlength="64" required="Obligatoire">
        <input type="submit" value="Validation">
      </form>
    </div>
</body>

</html>
