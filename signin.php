<?php
	session_start();

	//Récupération des données post pour l'inscription
	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {

		$_SESSION['userData'] = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		
		require_once 'pdoCizia/pdodbconfig.php';

        try {
            //Connexion
            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

			//Vérif si mail existant & ajout en bdd ou retour au formulaire
			$mail_exists = $bdd->prepare('SELECT COUNT(*) FROM users WHERE mail = "' . $_SESSION['userData'][2] . '";');

			$mail_exists->execute();

			if (!$mail_exists->fetchColumn()) {

				//Préparation de la requête insert
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
				
				//Récupération de l'id du user
				
				$sql = 'SELECT id FROM users WHERE mail = "' . $_SESSION['userData'][2] . '";';

				$q = $bdd->query($sql);
				$q->setFetchMode(PDO::FETCH_ASSOC);

				$row = $q->fetch();
				
				array_unshift($_SESSION['userData'], htmlspecialchars($row['id']));
				
				print_r($_SESSION['userData']);
				
				$bdd = null;
				
				header('Location : home.php');
				exit();
			}

			else {
				header('Location: index.php');
				exit();
			}
        }
        catch (PDOException $e) {
            /*print "Erreur : " . $e->getMessage() . "<br/>";*/
            die();
			header('Location: index.php');
			exit();
        }
	}