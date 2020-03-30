<?php
	include 'bdd.php';

	session_start();

	if(isset($_SESSION['username'])){

		$username = $_SESSION['username'];
		$badgeID = $_SESSION['badgeID'];

		$activity = $bdd->query("SELECT * FROM activity ORDER BY id DESC LIMIT 10");

		if(isset($_POST['users'])){
			header("Location: users.php");
		}

		if(isset($_POST['disconnect'])){
			header("Location: disconnect.php");
		}

	} else {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Réglages</title>
	</head>
	<body>

		<style>
			body {
				font-family: "San Francisco";
				background-color: #f2f2f2;
			}
			@font-face {
				font-family: "San Francisco";
				font-weight: 400;
				src: url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff");
			}
			.box {
				margin-top: 20px;
				background-color: #fff;
				padding: 20px;
				height: 200px;
			}

			.user {
				line-height: 150px;
			}

			.nav-bar {
				background-color: #26abd4;
				height: 75px;
				color: #fff;
			}

			.nav-bar h3 {
				line-height: 70px;
				padding-left: 20px;
				font-weight: bold;
			}
			.main-block {
				background-color: #fff;
				margin-top: 20px;
				padding: 20px;
			}
		</style>

		<div class="nav-bar">
			<h3>Portail Automatique</h3>
		</div>

		<div class="container">
			<div class="row">

				<div class="col-md-4">
					<div class="box" align="center">
						<h2 class="user">Bienvenue <span style="font-weight: bold;"><?php echo $username; ?></span></h2>
					</div>
				</div>

				<div class="col-md-4 ">
					<div class="box" align="center">
						<form action="" method="POST">
							<br>
							<p>Votre badge actuel : <span style="font-weight: bold;"><?php echo $badgeID ?></span></p>
							<br><br>
							<button type="submit" name="users" class="btn btn-info">Voir les utilisateurs</button>
						</form>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box" align="center">
						<form action="" method="POST">
							<br><br><br>
							<button type="submit" name="disconnect" class="btn btn-danger">Se déconnecter</button>
						</form>
					</div>
				</div>

				<div class="container">
					<div class="col-md-12 main-block">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Utilisateur</th>
									<th scope="col">Jour d'ouverture</th>
									<th scope="col">Heure d'ouverture</th>
								</tr>
							</thead>
							<tbody>
								<?php while($a = $activity->fetch()){ ?>
								<tr>
									<th scope="row"><?= $a['id'] ?></th>
									<td><?= $a['username'] ?></td>
									<td><?= $a['day'] ?></td>
									<td><?= $a['hour'] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</body>
	</html>
