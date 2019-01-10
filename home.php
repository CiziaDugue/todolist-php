<?php
	session_start();
	//print_r($_SESSION['userData']);

	require_once 'pdo/pdodbconfig.php';
	require_once 'functions/getUserList.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

		//recuperation todolists user
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
?>

<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <title>Home</title>
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
				<link href='css/style.css' rel='stylesheet' type='text/css'>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Ranga');
        </style>

    </head>
    <body>
		<header class="mt-3">
			<h1>TO DO LIST</h1>
			<h2>Bonjour <?php echo $_SESSION['userData'][2] . ' ' . $_SESSION['userData'][1] . '!' ?></h2>
		</header>
		<?php
			//erreur ou confirmation creation liste
			if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];
				$_SESSION['message']=NULL;
			}
		?>
        <nav class="my-4">
			<ul class="nav nav-pills justify-content-center">
				<li class="nav-item">
					<a class="nav-link active" href="home.php">Mes Listes</a>
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
        	<div class="row justify-content-center">
						<div class="col-4">
							<form action="functions/addList.php" method="post">
								<input type="text" required placeholder="label" name="label">
								<input value="Ajouter liste" type="submit">
							</form>
						</div>
						<div class="col-8">
						<?php
						//Générer bouton pour chaque todolist & lien créé dynamiquement
							while ($row = $q->fetch()):
								$tdlId = htmlspecialchars($row['id']);
								$tdlLabel = htmlspecialchars($row['label']); ?>
								<div class="btn-group mb-4">
									<a href="todolist.php?id=<?php echo $tdlId; ?>&label=<?php echo $tdlLabel; ?>">
										<button type="button" class="btn btn-list btn-primary ">
											<?php echo $tdlLabel; ?>
											<br>
											<?php echo getUserList($tdlId, $conn); ?>
										</button>
									</a>
									<a href="functions/delList.php?id=<?php echo $tdlId; ?>">
										<button class="btn">
											<i class="fa fa-trash"></i>
										</button>
									</a>
								</div>
						<?php endwhile; ?>
        		</div>
        	</div>
        </section>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>
