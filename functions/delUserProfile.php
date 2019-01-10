<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		if (isset($_POST['pwd1']) && isset($_POST['pwd2']) && isset($_POST['check2'])) {
			
			//Vérif pwd
			if (password_verify(htmlspecialchars($_POST['pwd1']), $_SESSION['userData'][4]) && htmlspecialchars($_POST['pwd1']) == htmlspecialchars($_POST['pwd1'])){
			
				//Préparation de la requête delete
				$delUserProf = $conn->prepare('DELETE FROM users WHERE id = :id LIMIT 1');

				//Exécuter la requête SQL
				$delUserProf->execute(array(
					'id' => $_SESSION['userData'][0]
				));
				
				//Réinit
				$_SESSION['userData'] = null;
				$delUserProf = null;
				$conn = null;
				
				//Message de confirmation
				//echo '<script>alert("Profil supprimé...");</script>';
				
				//Redirection
				header('Location: deconnexion.php');
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
			$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Remplissez le formulaire!</div>';
			//Redirection
			header("Location: ../profil.php");
			exit();
		}
	}

	/*Si erreur ou exception, interception du message*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
