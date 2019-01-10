<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	//echo $_POST['label'].$_POST['description'].$_POST['state_id'].$_SESSION['todolist_id'];

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
				'toDoList_id' => $_SESSION['todolist_id'],
				'user_id' => $_POST['user_id']
			));

			echo 'Un nouvel utilisateur a été ajouté : '.$_POST['label'];

			header('Location: ../todolist.php');
			exit();
		}
		else {
			echo 'Fais CHIER!!';
		}
	}

	/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
