<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['mail']) && isset($_POST['oldPwd']) && isset($_POST['newPwd'])) {
			
			//Vérif pwd
			if (password_verify(htmlspecialchars($_POST['oldPwd']), $_SESSION['userData'][4])){
			
				//Préparation de la requête update
				$majUserData = $conn->prepare('UPDATE users SET lastName=:lastName, firstName=:firstName, mail=:mail, password=:password WHERE id =' . $_SESSION['userData'][0]);

				//Exécuter la requête SQL
				$majUserData->execute(array(
					'lastName' => htmlspecialchars($_POST['lastName']),
					'firstName' => htmlspecialchars($_POST['firstName']),
					'mail' => htmlspecialchars($_POST['mail']),
					'password' => password_hash(htmlspecialchars($_POST['newPwd']), PASSWORD_DEFAULT)
				));
				
				//Maj de l'array userData
				$getUserData = 'SELECT id, lastName, firstName, mail, password FROM users WHERE mail = "' . htmlspecialchars($_POST['mail']) . '"';
				$q = $conn->query($getUserData);
				$q->setFetchMode(PDO::FETCH_ASSOC);
				$row = $q->fetch();
				$_SESSION['userData'] = array(htmlspecialchars($row['id']), htmlspecialchars($row['lastName']), htmlspecialchars($row['firstName']), htmlspecialchars($row['mail']), htmlspecialchars($row['password']));

				//Réinit
				$majUserData = null;
				$conn = null;
				//Redirection
				header('Location: ../profil.php');
				exit();
			}
			//Si mauvais mot de passe
			else {
				$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Mauvais mot de passe!</div>';
				//Redirection
				header("Location: ../profil.php");
				exit();
			}
		}
		else {
			echo 'Fais CHIER!!';
		}
	}

	/*Si erreur ou exception, interception du message*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
