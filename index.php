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
		<link rel="stylesheet" type="text/css" href="css/margin.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/items.css">
		<link rel="stylesheet" type="text/css" href="css/crud.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/contact.css">
		<link rel="stylesheet" type="text/css" href="css/cart.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">  
	</head>
	<body><?php 
	 	require("header.html");
		require 'functions.php';
		require 'shop/crud.php';
		require "cartFunctionality.php";
		// Funkcija crud daje CRUD funkcionalnosti web aplikaciji i prikazuje potrebne elemente web stranice

 		echo '</div>';
 	?>

 		<div id="hero-image">
 			<div class="container">
 				
 			</div>
 		</div>
 		<div id="our-picks">
 			<form class="container" id="picks-form"method="POST" action="shop/index.php">
 				<div id="wc3">
 					<input type="submit" name="tip[]" value="2">
 				</div>
 				<div id="juju">
 					<input type="submit" name="tip[]" value="3">
 				</div>
 				<div id="hxh">
 					<input type="submit" name="tip[]" value="1">
 				</div>
 				<div id="rm">
 					<input type="submit" name="tip[]" value="4">
 				</div>
 			</form>
 		</div>
 		<div id="shortcuts"></div>
 		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>
