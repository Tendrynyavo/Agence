<?php 
	include("./db_function.php");
	$p=get("Boss");
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log-In Admin</title>
</head>
<body>
	<p><?php echo $p[0]->nomuser; ?></p>
</body>
</html>