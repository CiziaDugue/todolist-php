<?php
	session_start();
	
	//Récupération des données utilisateur pour l'inscription
	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
		
		$_SESSION['userData'] = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		
		//Vérif si user déjà en bdd
		
		//Ajout en bdd
		require_once 'pdo/pdo0dbconfig.php';

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
		
		$_SESSION['userData'] = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
		
		//Vérification du mot de passe
		
		//Accès aux données user en bdd
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
			<h1>Bonjour <?php echo $_SESSION['userData'][1] . ' ' . $_SESSION['userData'][0] . '!' ?></h1>
		</header>
        <section class="container">

        </section>

        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>