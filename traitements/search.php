<?php 
	if (isset($_POST['search'])==true) {
		include '../inc/db_function.php';7
		$search=$_POST['search'];
		$result=search($search);	
	}
 ?>