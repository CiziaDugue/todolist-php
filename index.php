<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href='css/style.css' rel='stylesheet' type='text/css'>
        <title>Projet back-end</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Ranga');
        </style>

    </head>
    <body>
		<header>
			<h1>TO DO LIST</h1>
		</header>
        <section class="container">

            <div class="contentPage loginContentPage">
               
                <?php
					if(isset($_GET['message'])){
						echo $_GET['message'];
						$_GET['message'] = null;
					}
				?>
                
                <div class="form">
                    <ul class="tab_group">
                        <li id="inscription" class="active"><a>Inscription</a></li>
                        <li id="connexion"><a>Connexion</a></li>
                    </ul>
                    <div class="tab_content">
                        <div id="signUp">

                            <form action="signin.php" method="post">
                                <div class="top_row">
                                    <div class="field_wrap">
                                        <input type="text" required autocomplete="off" name="nom" placeholder="Nom *"/>
                                    </div>
                                    <div class="field_wrap">
                                        <input type="text" required autocomplete="off" name="prenom" placeholder="Prénom *"/>
                                    </div>
                                </div>
                                <div class="field_wrap">
                                    <input type="email"required autocomplete="off" name="email" placeholder="Email *"/>
                                </div>
                                <div class="field_wrap">
                                    <input type="text" required autocomplete="off" name="password" placeholder="Mot de passe *"/>
                                </div>
                                <input type="submit" class="button button_block" value="signin">
                            </form>
                        </div>
                        <div id="logIn">
                        
                            <form action="login.php" method="post">
                                <div class="field_wrap">
                                    <input type="email" name="email" placeholder="Adresse eMail *">
                                </div>
                                <div class="field_wrap">
                                    <input type="password" name="password" placeholder="Mot de passe *">
                                </div>

                                <p class="oubli"><a href="#">mot de passe oublié?</a></p>

                                <input class="button button_block" type="submit" value="login">

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>