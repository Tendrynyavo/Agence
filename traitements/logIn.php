<?php 
	if (isset($_POST['sub'])==true) {
		include '../inc/db_function.php';
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		logIn($email, $mdp);	
	}
 ?>