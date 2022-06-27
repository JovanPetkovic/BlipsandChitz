<?php

	$mysql_server = "localhost";	
	$mysql_user = "root";
	$mysql_password = "banana554";
	$mysql_db = "blips_and_chitz";
	$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db) or die("could not connect to db");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blips and Chitz</title>
		<link rel="stylesheet" type="text/css" href="../css/margin.css">
		<link rel="stylesheet" type="text/css" href="../css/header.css">
		<link rel="stylesheet" type="text/css" href="../css/footer.css">
		<link rel="stylesheet" type="text/css" href="../css/items.css">
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/cart.css"> 
	</head>
	<body>
		<?php 
		 	require("../header.html");
			require '../functions.php';
			require 'crud.php';
			require "../cartFunctionality.php";
			// Funkcija crud daje CRUD funkcionalnosti web aplikaciji i prikazuje potrebne elemente web stranice

	 		crud($db);
	 		
	 		echo '</div>';
 		?>
 			<div id="back"></div>
 		<script type="text/javascript" src="../js/cartFunctionality.js"></script> 
	</body>
</html>