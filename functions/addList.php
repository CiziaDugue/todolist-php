<?php
	session_start();

	require_once '../pdo/pdodbconfig.php';

	echo $_POST['label'];

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		if (isset($_POST['label'])) {

		//ajout nouvelle todo
			$addList = $conn->prepare('INSERT INTO toDoLists (label)'
			.' VALUES (:label)');

			//Requête SQL
			$addList->execute(array(
				'label' => htmlspecialchars($_POST['label']),
			));

			//get id de la nouvelle todo
			$getTdlId = 'SELECT id FROM toDoLists WHERE label = "' . htmlspecialchars($_POST['label']) . '"';
			$q = $conn->query($getTdlId);
			$q->setFetchMode(PDO::FETCH_ASSOC);

			$row = $q->fetch();

			//Lier user et list
			$assoUserList = $conn->prepare('INSERT INTO users_toDoLists (toDoList_id, user_id)'
			.' VALUES (:toDoList_id, :user_id)');

			//Requête SQL
			$assoUserList->execute(array(
				'toDoList_id' => htmlspecialchars($row['id']),
				'user_id' => htmlspecialchars($_SESSION['userData'][0])
			));

			//alert success
			$_SESSION['message'] = '<div class="alert alert-success mx-5" role="alert">liste créée</div>';

			//réinit
			$addList = null;
			$getTdlId = null;
			$assoUserList = null;

			//redirection
			header('Location: ../home.php');
			exit();
		}
		else {
			$_SESSION['message'] = '<div class="alert alert-success mx-5" role="alert">saisissez un autre titre</div>';
		}
	}

	/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
