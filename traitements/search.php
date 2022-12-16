<?php 
	if (isset($_POST['search'])==true) {
		include '../inc/db_function.php';
		$search=$_POST['search'];
		$result=search($search);
		header("Location: ../page/liste/search.php");	
	}

 ?>