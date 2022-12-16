<?php 
	if (isset($_POST['sub'])==true) {
		include '../inc/db_function.php';
		$nom=$_POST['username'];
		$email=$_POST['email'];
		$mdp=$_POST['pwd'];
		$numTel=$_POST['tel'];
		signUp($nom, $email, $mdp, $numTel);	
	}
	header("Location: ../page/admin/login.php")
 ?>