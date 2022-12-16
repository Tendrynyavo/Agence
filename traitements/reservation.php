<?php 
	session_start();
	if (isset($_POST['reserve'])==true) {
		include '../inc/db_function.php';
		$idUser=$_SESSION['id'];
		$idHabitation=$_GET['idhabitation'];
		$arrivee=$_GET['arrivee'];
		$depart=$_GET['depart'];	
		reservation($idUser, $idHabitation, $arrivee, $depart);
	}
	header("Location: ../page/detail/detail.php");
 ?>