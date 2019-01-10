<?php
	session_start();

	require_once 'pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		//recuperation actions de la todolist

		$sql = 'SELECT * from toDoActions WHERE toDoList_id= "' . $_SESSION['todolist_id'] . ';"';

		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}

	/*Si erreur ou exception, interception du message ou mauvaise adresse mail*/
	catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
				<title>Todolist</title>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
				<link href='css/style.css' rel='stylesheet' type='text/css'>
				<style>
            @import url('https://fonts.googleapis.com/css?family=Ranga');
        </style>

    </head>
    <body>
		<header class="mt-3">
			<h1>TO DO LIST</h1>
			<h2><?php echo $_SESSION['todolist_label']; ?></h2>
		</header>
   		<?php
			//Affichage des erreurs de mot de passe
			if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];
				$_SESSION['message'] = null;
			}
		?>
    	<nav class="my-4">
			<ul class="nav nav-pills justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="home.php">Mes Listes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profil.php">Profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="functions/deconnexion.php" tabindex="-1" aria-disabled="true">Déconnexion</a>
				</li>
			</ul>
		</nav>
        <section class="container">
        	<div class="row justify-content-between">
				<div class="col-2">
				<form action="functions/addAction.php" method="post">
					<input type="text" required placeholder="label" name="label">
					<textarea required placeholder="Description de l'action" name="description"></textarea>
					<select class="custom-select" name="state_id">
						<option selected>1</option>
						<option>2</option>
						<option>3</option>
					</select>
					<input required type="text" placeholder="Utilisateur" name="user_id">
					<input value="Ajouter une action" type="submit">
				</form>
			</div>
				<div class="col-9">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">id</th>
							<th scope="col">label</th>
							<th scope="col">description</th>
							<th scope="col">statut</th>
							<th scope="col">utilisateur</th>
						</tr>
					</thead>
					<tbody>

						<!-- Générer tableau avec une ligne pour chaque actions -->
						<?php	while ($row = $q->fetch()): ?>
						<tr>
							<th scope="row">
								<?php echo htmlspecialchars($row['id']); ?>
							</th>
							<td>
								<?php echo htmlspecialchars($row['label']); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($row['description']); ?>
							</td>
							<td>
								<select class="custom-select">
									<option selected>
										<?php echo htmlspecialchars($row['state_id']); ?>
									</option>
									<option value="1">A faire</option>
									<option value="2">En cours</option>
									<option value="3">Terminé</option>
								</select>
							</td>
							<td>
								<?php echo htmlspecialchars($row['user_id']); ?>
							</td>
						</tr>
						<?php endwhile; ?>

					</tbody>
				</table>
        	</div>
        	</div>
        </section>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>
