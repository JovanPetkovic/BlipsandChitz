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
		<title>Contact - Blips and Chitz</title>
		<link rel="stylesheet" type="text/css" href="../css/margin.css">
		<link rel="stylesheet" type="text/css" href="../css/header.css">
		<link rel="stylesheet" type="text/css" href="../css/footer.css">
		<link rel="stylesheet" type="text/css" href="../css/items.css">
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/contact.css">
		<link rel="stylesheet" type="text/css" href="../css/cart.css"> 
	</head>
	<body>
		<?php require("../header.html"); ?>
		<div class="bc">
			<form method="post" id="contact" action="contact.php" enctype="multipart/form-data" >
				<div id="fields">
					<div>
						<input type="text" name="name" id="contact-name" placeholder="Name">
					</div>
					<div>
						<input type="text" name="email" id="contact-email"
						placeholder="Email">
					</div>
					<input type="submit" name="submitbutton" value="Send">
				</div>
				<div id="text-area">
					<textarea name="text" required cols='50' rows="10" id="contact-text" placeholder="Message"></textarea>
				</div>
			</form>	
		</div>
		<script type="text/javascript" src="js/contact.js"></script>
	</body>
</html>
