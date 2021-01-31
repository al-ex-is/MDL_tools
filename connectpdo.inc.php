<?php
	function connectpdo()
	{
		//permet de gérer les éventuelles erreurs
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//déclare l'utilisation du jeu de caractères UTF8
		$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';
		//on tente la connection à BD
			//connection à la base localhost
			$login = 'root';
			$mdp = '';
			$DB = 'database';
			$server = '127.0.0.1';
		try
		{
			//Connection à BD MySQL
			$conn = new PDO('mysql:host='.$server.'; dbname='.$DB, $login, $mdp, $pdo_options);
		}
		//aff message si exception levée
		catch (PDOException $monexception)
		{
			echo 'Connect ERROR to MySQL!: <br/>'.$monexception->getMessage();
			exit();
		}
		return $conn;
	}
?>
