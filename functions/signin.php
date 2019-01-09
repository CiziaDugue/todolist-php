<?php
	session_start();


	//Récupération des données post pour l'inscription
	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
		
		//Cryptage du mot de passe
		$hashed_pwd = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

		//Stockage des données utilisateur dans une variable de session
		$_SESSION['userData'] = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), $hashed_pwd);

		require_once '../pdo/pdodbconfig.php';

		//Ajout du nouvel utilisateur
        try {
            //Connexion
            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

			//Vérif si mail existant
			$mail_exists = $bdd->prepare('SELECT COUNT(*) FROM users WHERE mail = "' . $_SESSION['userData'][2] . '";');

			$mail_exists->execute();

			if (!$mail_exists->fetchColumn()) {

				//Préparation de la requête insert
				$req = $bdd->prepare('INSERT INTO users (lastName, firstName, mail, password)'
				.' VALUES (:lastName, :firstName, :mail, :password)');

				//Exécution requête SQL
				$req->execute(array(
					'lastName' => $_SESSION['userData'][0],
					'firstName' => $_SESSION['userData'][1],
					'mail' => $_SESSION['userData'][2],
					'password' => $_SESSION['userData'][3]
				));

				$req = null;

				//Récupération de l'id du user et ajout aux userdata

				$sql = 'SELECT id FROM users WHERE mail = "' . $_SESSION['userData'][2] . '";';

				$q = $bdd->query($sql);
				$q->setFetchMode(PDO::FETCH_ASSOC);

				$row = $q->fetch();

				array_unshift($_SESSION['userData'], htmlspecialchars($row['id']));

				//print_r($_SESSION['userData']);
				
				//Réinit
				$sql = null;
				$bdd = null;
				
				//Redirection
				header('Location: ../home.php');
				exit();
			}

			else {
				//Si mauvaise adresse mail
				$_SESSION['message'] = '<div class="alert alert-warning mx-5" role="alert">Adresse mail déjà prise!</div>';
				//Redirection
				header("Location: ../index.php");
				exit();
			}
        }
        catch (PDOException $e) {
            /*print "Erreur : " . $e->getMessage() . "<br/>";*/
            die();
			header('Location: ../index.php');
			exit();
        }
	}
