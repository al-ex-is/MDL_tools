<?php
session_start();
$_SESSION["identifiant"] = null;
$_SESSION["mot_de_passe"] = null;
$_SESSION["role"] = null;
$_SESSION["controle"] = FALSE;
$_SESSION["niveau_acces"] = null;
header("Location: ../index.php");
?>