<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    	if (isset($_GET['id'])) {
			
			//Préparation de la requête delete
			$delList = $conn->prepare('DELETE FROM toDoLists WHERE id = :id LIMIT 1');

			//Exécuter la requête SQL
			$delList->execute(array(
				'id' => htmlspecialchars($_GET['id'])
			));

			//Réinit
			$delList = null;
			$conn = null;

			//Message de confirmation
			$_SESSION['message'] = '<div class="alert alert-dark mx-5" role="alert">Liste supprimée avec succès</div>';

			//Redirection
			header('Location: ../home.php');
			exit();
		}
		else {
			header('Location: ../home.php');
			exit();
			echo '<script>alert("erreur");</script>';
		}
	}
	/*Si erreur ou exception, interception du message*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
