<?php
	session_start();

	//Récupération des données utilisateur pour la connexion
	if (isset($_POST['email']) && isset($_POST['password'])) {

		$user_email = htmlspecialchars($_POST['email']);
		$user_pwd = htmlspecialchars($_POST['password']);

		//Vérification du mot de passe

		require_once '../pdo/pdodbconfig.php';

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

			//Accès aux données user en bdd

			$sql = 'SELECT id, lastName, firstName, mail, password FROM users WHERE mail = "' . $user_email . '"';

			$q = $conn->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);

			$row = $q->fetch();

			if (!$row){
				//Si mauvaise adresse mail
				$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Adresse mail inconnue!</div>';
				$conn = null;
				$sql = null;
				//Redirection
				header("Location: ../index.php");
				exit();
			}

			//Vérification mot de passe
			else if (password_verify($user_pwd, $row['password'])){

				$_SESSION['userData'] = array(htmlspecialchars($row['id']), htmlspecialchars($row['lastName']), htmlspecialchars($row['firstName']), htmlspecialchars($row['mail']), htmlspecialchars($row['password']));
				
				$conn = null;
				$sql = null;
				header('Location: ../home.php');
				exit();
			}

			else {
				//Si mauvais mot de passe
				$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Mauvais mot de passe!</div>';
				$conn = null;
				$sql = null;
				//Redirection
				header("Location: ../index.php");
				exit();
			}
        }

		/*Si erreur ou exception, interception du message*/
			catch (PDOException $pe) {
			die("Could not connect to the database $dbname :" . $pe->getMessage());
		}
	}
