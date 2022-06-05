<?php



require "../ShopItem.php";
require "../ShoppingCart.php";

session_start();





?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/cart.css">
		<title>Cart - Blips and Chitz</title>
	</head>
	<body>
		<?php

			echo '<div id="cart"> ';

    		$_SESSION["cart"]->start();

    		echo '</div>';

		    echo '<div id="buttons">
		                <button id="buy">Buy</button>
		                <button id="clear">Clear</button>
		             </div>';

		?>
	<script type="text/javascript" src="../js/cart.js"></script>
	</body>
</html>