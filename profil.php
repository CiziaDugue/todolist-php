<?php
	session_start();

	print_r($_SESSION['userData']);

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
	<header class="mb-5">
		<h1>Profil utilisateur</h1>
		<h2>Bonjour
			<?php echo $_SESSION['userData'][2] . ' ' . $_SESSION['userData'][1] . '!' ?>
		</h2>
	</header>
	<section class="container">
		<div class="row">
				<div class="col-4">
					<div class="text-left">
						<img src="img/logo_dta.jpg" class="rounded img-thumbnail img-fluid" alt="Photo de profil">
					</div>
					<nav class="nav flex-column">
						<a class="nav-link active" href="home.php">Mes Listes</a>
						<a class="nav-link" href="#">Ajouter une liste</a>
						<a class="nav-link" href="#">Inviter un utilisateur</a>
						<a class="nav-link" href="profil.php">Profil</a>
					</nav>
				</div>
        	
				<div class="col-8">
					<form>
					<div class="container">				
						<label for="validationServer01">Nom: <?php echo $_SESSION['userData'][1]; ?></label>
						<input type="text" class="form-control is-valid" id="validationServer01" placeholder="" value="lastName" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="container">				
						<label for="validationServer02">Prénom: <?php echo $_SESSION['userData'][2]; ?></label>
						<input type="text" class="form-control is-valid" id="validationServer02" placeholder="" value="firstName" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<br>
					<div class="container">	
						<label for="validationServerEmail">Mail: <?php echo $_SESSION['userData'][3]; ?></label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend3">@</span>
							</div>
							<input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="" aria-describedby="inputGroupPrepend3" value="mail" required>
							<div class="invalid-feedback">
								Entrez une adresse mail valide.
							</div>
						</div>
					</div>
					<div class="container">
						<label for="validationServer02">Mot de passe: <?php echo $_SESSION['userData'][4]; ?></label>
						<input type="text" class="form-control is-valid" id="validationServer02" placeholder="" value="password" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
							<label class="form-check-label" for="invalidCheck3">
								Confirmer les changements.
							</label>
							<div class="invalid-feedback">
								Vous devez cocher pour confirmer.
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Valider les changements</button>
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