<!DOCTYPE html>
<html lang="fr">
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
		</header>
        <section class="container">

            <div class="contentPage loginContentPage">
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

        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>