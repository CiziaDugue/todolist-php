<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		if (isset($_POST['label']) && isset($_POST['description']) && isset($_POST['state_id']) && isset($_POST['user_id']) && isset($_POST['addSubmit'])) {
			//Préparation de la requête insert
			$addAction = $conn->prepare('INSERT INTO toDoActions (label, description, state_id, toDoList_id, user_id)'
			.' VALUES (:label, :description, :state_id, :toDoList_id, :user_id)');

			//Requête SQL
			$addAction->execute(array(
				'label' => $_POST['label'],
				'description' => $_POST['description'],
				'state_id' => $_POST['state_id'],
				'toDoList_id' => $_SESSION['todolistId'],
				'user_id' => $_POST['user_id']
			));
			
			//Message de confirmation
			$_SESSION['message'] = '<div class="alert alert-success mx-5" role="alert">Action ajoutée avec succès!</div>';

			//Redirection
			header('Location: ../todolist.php');
			exit();
		}
		else {
			$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Remplissez le formulaire!</div>';
			//Redirection
			header('Location: ../todolist.php');
			exit();
		}
	}

	/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
