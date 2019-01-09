<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PDO 1 : Connexion</title>

        
    </head>
    <body>
        <h1>Connexion à une BDD</h1>
		<?php
		/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/
		require_once 'pdodbconfig.php';

		/*Essai de connexion en créant on objet connexion avec les informations de la BDD*/
		try {
		    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		    echo "Connected to $dbname at $host successfully.";

		    //Fermer la connexion SQL (si absent, automatique à la fin du script)
		    $conn = null;
		}

		/*Si erreur ou exception, interception du message*/
		 catch (PDOException $pe) {
		    die("Could not connect to the database $dbname :" . $pe->getMessage());
		}
        ?>
    </body>
</html>