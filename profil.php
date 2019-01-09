<?php
	session_start();
	//print_r($_SESSION['userData']);

	require_once 'pdo/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
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
		<title>Profil</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<style>
			@import url('https://fonts.googleapis.com/css?family=Ranga');
		</style>

	</head>

	<body>
		<header class="mt-3">
			<h1>Profil utilisateur</h1>
			<h2>Bonjour
				<?php echo $_SESSION['userData'][2] . ' ' . $_SESSION['userData'][1] . '!' ?>
			</h2>
		</header>
		<nav class="my-4">
				<ul class="nav nav-pills justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="home.php">Mes Listes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="profil.php">Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="functions/deconnexion.php" tabindex="-1" aria-disabled="true">Déconnexion</a>
					</li>
				</ul>
			</nav>
		<section class="container">
			<div class="row justify-content-center">
					<div class="col-4">
						<div class="text-left mb-4">
							<img src="img/logo_dta.jpg" class="rounded img-thumbnail img-fluid" alt="Photo de profil">
						</div>
						<div>
							<p class="mb-3">Nom: <?php echo $_SESSION['userData'][1]; ?></p>
							<p class="mb-3">Prénom: <?php echo $_SESSION['userData'][2]; ?></p>
							<p class="mb-3">Mail: <?php echo $_SESSION['userData'][3]; ?></p>
							<p class="mb-3">Mot de passe: <?php echo $_SESSION['userData'][4]; ?></p>
						</div>
					</div>

					<div class="col-4 text-center">
						<h3 class="mb-2">Modifier mes données personnelles</h3>
						<form>
							<div class="form-group">
								<label for="lastName">Nom</label>
								<input type="text" class="form-control" placeholder="<?php echo $_SESSION['userData'][1]; ?>" name="lastName">
							</div>
							<div class="form-group">
								<label for="firstName">Prénom</label>
								<input type="text" class="form-control" placeholder="<?php echo $_SESSION['userData'][2]; ?>" name="firstName">
							</div>
							<div class="form-group">
								<label for="mail">Adresse mail</label>
								<input type="email" class="form-control" placeholder="<?php echo $_SESSION['userData'][3]; ?>" name="mail">
							</div>
							<div class="form-group">
								<label for="oldPwd">Ancien mot de passe</label>
								<input type="password" class="form-control" placeholder="******" name="oldPwd">
							</div>
							<div class="form-group">
								<label for="newPwd">Nouveau mot de passe</label>
								<input type="password" class="form-control" placeholder="******" name="newPwd">
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Valider les changements</label>
							</div>
							<button type="submit" class="btn btn-primary">Envoyer</button>
						</form>
					</div>
				</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/login.js"></script>

	</body>
</html>