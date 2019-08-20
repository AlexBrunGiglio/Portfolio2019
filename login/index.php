<?php
//require("connect.php");
session_start();
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);

$opt = parse_ini_file("db.ini");
try {
	$DB = new PDO($opt["host"], $opt["user"], $opt["pass"]);
} catch (Exception $e) { }


if (isset($_POST["username"]) && isset($_POST["pass"])) {
	extract($_POST);
	$valid = true;


	$pseudo = htmlspecialchars(trim($_POST["username"]));
	$password = trim($_POST["pass"]);

	if (empty($pseudo)) {
		$valid = false;
		$error_pseudo = "Veuilez renseigner un pseudo !";
	}

	if (empty($password)) {
		$valid = false;
		$error_password = "Veuillez renseigner un mot de passe !";
	}

	$req = $DB->prepare('Select * from `admin` where `pseudo` = :pseudo and password = :password');
	$req->execute(array('pseudo' => $pseudo, 'password' => $password));
	$result = $req->fetch();

	if ($result != 0) {
		$_SESSION['id'] = $result['id'];
		$_SESSION['pseudo'] = $result['pseudo'];
		header('Location :https://alexandrebrungiglio.fr');
	} else {
		$error_compt = "Votre pseudo et/ou mot de passe ne correspondent pas.";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Portfolilo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../img/hero/2.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="post" action="#">
					<div class="login100-form-avatar">
						<img src="../img/hero/new.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Alexandre BRUN-GIGLIO
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Un identifiant est requis">
						<input class="input100" type="text" name="username" placeholder="Identifiant">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Un mot de passe est requis">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Connexion
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="#">
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>