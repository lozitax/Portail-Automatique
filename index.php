<?php
	include 'bdd.php';

	session_start();

	if(isset($_SESSION['username'])){

		header("Location: settings.php");

	} else {

		if(isset($_POST['submit'])){
			if(!empty($_POST['userID']) AND !empty($_POST['passWD'])){
				$username = $_POST['userID'];
				$password = $_POST['passWD'];
				$req = $bdd->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
				$req->execute(array($username, $password));
				$userexist = $req->rowCount();
				if($userexist == 1){
					$userinfo = $req->fetch();
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['username'] = $userinfo['username'];
					$_SESSION['password'] = $userinfo['password'];
					$_SESSION['badgeID'] = $userinfo['badgeID'];
					header("Location: settings.php");
				} else {
					?>

						<script type="text/javascript">
							alert("Le nom d'utilisateur et le mot de passe ne corresponde pas !")
						</script>

					<?php
				}
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Connexion</title>
</head>
<body>

	<style>
		.card {
			margin-top: 20px;
		}
		body {
			font-family: "San Francisco";
		}
		@font-face {
			font-family: "San Francisco";
			font-weight: 400;
			src: url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff");
		}
	</style>

	<main class="login-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">Connexion</div>
							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group row">
										<label for="userID" class="col-md-4 col-form-label text-md-right">Identifiant</label>
										<div class="col-md-6">
											<input type="text" id="userID" class="form-control" name="userID" required autofocus>
										</div>
									</div>

									<div class="form-group row">
										<label for="passWD" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
										<div class="col-md-6">
											<input type="password" id="passWD" class="form-control" name="passWD" required>
										</div>
									</div>

									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary" name="submit">Connexion</button>
										<a href="#" class="btn btn-link">Mot de passe oublié ?</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
