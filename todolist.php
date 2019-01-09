<?php
	session_start();

	require_once 'pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		//recuperation actions de la todolist

		$sql = 'SELECT t1.id, t1.label from toDoLists t1 INNER JOIN users_toDoLists t2 ON t1.id=t2.toDoList_id WHERE t2.user_id= "' . $_SESSION['userData'][0] . '"';

		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);


	}

	/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
		header('Location: index.php');
		exit();
	}

	echo 'L\'id de la tdl sélectionnée est ' .$_GET['id'];

?>


<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <link href='css/style.css' rel='stylesheet' type='text/css'>
        <title>Todolist</title>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Ranga');
        </style>

    </head>
    <body>
				<header>
					<h1>TO DO LIST</h1>
					<h2>Bonjour <?php echo $_SESSION['userData'][2] . ' ' . $_SESSION['userData'][1] . '!' ?></h2>
				</header>
        <section class="container">
					<div id="container">
						<form data-bind="submit: addTask">
    					Add task: <input data-bind="value: newTaskText" placeholder="What needs to be done?" />
    					<button class="btn btn-primary" type="submit">Add</button>
						</form>

						<ul data-bind="foreach: tasks, visible: tasks().length > 0">
						    <li>
						        <input type="checkbox" data-bind="checked: isDone" />
						        <input data-bind="value: title, disable: isDone" />
						        <button class="btn btn-primary" a href="#" data-bind="click: $parent.removeTask">Delete</a></button>
						    </li>
						</ul>




        	</div>
        </section>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>
