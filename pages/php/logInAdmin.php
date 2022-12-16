<?php 
	if (isset($_GET['email'])) {
		include("../../inc/php/db_function");
		logIn($_GET['email'], $_GET['pwd']);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/styles/css/logInAdmin.css">
	<title>Log-In Admin</title>
</head>
<body>
	<div id="logIn">
		<h2>Log-In</h2>
		<form method="post" action="logInAdmin.php">
			<input type="email" name="email" placeholder="Email" class="fill">
			<br>
			<input type="password" name="pwd" placeholder="Pass Word" class="fill">
			<br>
			<input type="submit" name="sub" value="Log-In" id="sub" class="button">
			<br>
			<button class="button">Sign</button>
		</form>
	</div>
</body>
</html>