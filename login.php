<?php
	session_start();

	//Récupération des données utilisateur pour la connexion
	if (isset($_POST['email']) && isset($_POST['password'])) {

		$_SESSION['email'] = htmlspecialchars($_POST['email']);
		$_SESSION['password'] = htmlspecialchars($_POST['password']);

		//Vérification du mot de passe

		require_once 'pdoCerise/pdodbconfig.php';

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			echo "Connected to $dbname at $host successfully.";

			//Accès aux données user en bdd

			$sql = 'SELECT id, lastName, firstName, mail, password FROM users WHERE mail = "' . $_SESSION['email'] . '"';

			$q = $conn->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);

			$row = $q->fetch();

			//Vérification mot de passe
			if ($_SESSION['password'] == $row['password']){

				$_SESSION['userData'] = array(htmlspecialchars($row['id']), htmlspecialchars($row['lastName']), htmlspecialchars($row['firstName']), htmlspecialchars($row['mail']), htmlspecialchars($row['password']));

				header('Location: home.php');
				exit();
			}

			else {
				header('Location: index.php');
				exit();
			}
        }

		/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
		catch (PDOException $pe) {
			die("Could not connect to the database $dbname :" . $pe->getMessage());
			header('Location: index.php');
			exit();
		}
	}
