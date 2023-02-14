<?php
  function rename_table($connexion)
  {
    /*$NAME=$_POST['table_name'];
    $requete = "RENAME TABLE `conseil_adm` TO $NAME";
    $connexion->query($requete);*/
    try
		{
      $NAME=$_POST['table_name'];
      $requete = "RENAME TABLE `conseil_adm` TO ".$NAME;
      $rn = $connexion->query($requete);
		}
		catch (PDOException $monexception)
		{
			echo 'Edit ERROR to MySQL!: <br/>'.$monexception->getMessage();
			exit();
		}
		return $rn;
  }
  /*function __construct(argument)
  {
    // code...
  }*/
?>
