<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    	if (isset($_GET['id'])) {
			//Préparation de la requête delete
			$delAction = $conn->prepare('DELETE FROM toDoActions WHERE id = :id LIMIT 1');

			//Exécuter la requête SQL
			$delAction->execute(array(
				'id' => htmlspecialchars($_GET['id'])
			));

			//Réinit
			$delAction = null;
			$conn = null;

			//Message de confirmation
			$_SESSION['message'] = '<div class="alert alert-dark mx-5" role="alert">Action supprimée avec succès!</div>';

			//Redirection
			header('Location: ../todolist.php');
			exit();
		}
		else {
		  echo '<script>alert("erreur");</script>';
		}
	}
	/*Si erreur ou exception, interception du message*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
