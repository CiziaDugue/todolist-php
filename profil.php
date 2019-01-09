<?php
	session_start();

  print_r($_SESSION['userData']);

	require_once 'pdoCerise/pdodbconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		echo "Connected to $dbname at $host successfully.";
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
          <link href='css/style.css' rel='stylesheet' type='text/css'>
          <title>Projet back-end</title>
          <style>
              @import url('https://fonts.googleapis.com/css?family=Ranga');
          </style>

      </head>
      <body>
  		<header>
  			<h1>TO DO LIST</h1>
  			<h2>Bonjour <?php echo $_SESSION['userData'][2] . ' ' . $_SESSION['userData'][1] . '!' ?></h2>
  		</header>
          <section class="container">
  					<div id="container">
  						<table class="table table-bordered table-condensed">
  							<thead>
  								<tr>
  									<th>Id</th>
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
  										<td><?php echo $_SESSION['userData'][4]; ?></td>
  									</tr>

  							</tbody>
  						</table>


          	</div>
          </section>

          <script type="text/javascript" src="js/login.js"></script>

      </body>
  </html>
