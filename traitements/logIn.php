<?php 
	if (isset($_POST['sub'])==true) {
		include '../inc/db_function.php';
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		logIn($email, $mdp);
		$user=getMember($email);
		$id=$user[0]->idUser;
		session_start();
		$_SESSION['id']=$id;
	}
 ?>