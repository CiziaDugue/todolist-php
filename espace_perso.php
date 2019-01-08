<?php
	session_start();

	//Récupération des données utilisateur pour l'inscription
	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {

		$_SESSION['userData'] = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));

		//Vérif si user déjà en bdd

		//Ajout en bdd
		require_once 'pdoCerise/pdodbconfig.php';

        try {
            //Connexion
            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            //Préparation de la requête
            $req = $bdd->prepare('INSERT INTO users (lastName, firstName, mail, password)'
            .' VALUES (:lastName, :firstName, :mail, :password)');

            //Requête SQL
            $req->execute(array(
				'lastName' => $_SESSION['userData'][0],
				'firstName' => $_SESSION['userData'][1],
				'mail' => $_SESSION['userData'][2],
				'password' => $_SESSION['userData'][3]
            ));

            //Affichage du résultat
            echo('<div>Un nouvel utilisateur a été ajouté : '.$_SESSION['userData'][1].'</div>');

            $req = null;

            $bdd = null;
        }
        catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
	}

	//Récupération des données utilisateur pour la connexion
	elseif (isset($_POST['email']) && isset($_POST['password'])) {

		$_SESSION['email'] = htmlspecialchars($_POST['email']);
		$_SESSION['password'] = htmlspecialchars($_POST['password']);

		//Vérification du mot de passe
		require_once 'pdoCerise/pdodbconfig.php';

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			echo "Connected to $dbname at $host successfully.";

			/*$sql = 'SELECT password FROM users WHERE mail = \'' . $_SESSION['email'] . '\'';

			$q = $conn->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);*/

			//Accès aux données user en bdd

			$sql = 'SELECT lastName, firstName, mail, password FROM users WHERE mail = "' . $_SESSION['email'] . '"';

			$q = $conn->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);

			$row = $q->fetch();

			$_SESSION['userData'] = array(htmlspecialchars($row['lastName']), htmlspecialchars($row['firstName']), htmlspecialchars($row['mail']), htmlspecialchars($row['password']));
        }

            /*Si erreur ou exception, interception du message*/
		catch (PDOException $pe) {
			die("Could not connect to the database $dbname :" . $pe->getMessage());
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href='css/style.css' rel='stylesheet' type='text/css'>
        <title>Projet back-end</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Ranga');
        </style>

    </head>
    <body>
		<header>
			<h1>TO DO LIST</h1>
			<h2>Bonjour <?php echo $_SESSION['userData'][1] . ' ' . $_SESSION['userData'][0] . '!' ?></h2>
		</header>
        <section class="container">
			<div id="container">
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>

							<tr>
								<td><?php echo $_SESSION['userData'][0]; ?></td>
								<td><?php echo $_SESSION['userData'][1]; ?></td>
								<td><?php echo $_SESSION['userData'][2]; ?></td>
								<td><?php echo $_SESSION['userData'][3]; ?></td>
							</tr>

					</tbody>
				</table>
        	</div>
        </section>

        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>
