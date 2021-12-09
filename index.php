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
	</head>
	<body><?php 
	 	
	 	require("header.html");
		require 'functions.php';
		require 'crud.php';
		echo '<form method="post" id="select">
		<input type="submit" name="hxh" value="Hunter X Hunter">
		<input type="submit" name="rick" value="Rick & Morty">
		<input type="submit" name="juju" value="Jujutsu Kaisen">
		<input type="submit" name="warcraft" value="WarCraft">
		<input type="submit" name="all" value="All">
		</form>	';
		echo '<div class="items">';

		//Konektovanje u bazu

		$mysql_server = "localhost";	
		$mysql_user = "root";
		$mysql_password = "banana554";
		$mysql_db = "blips_and_chitz";
		$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);
		
		//$_POST sadrzi podatke koje se salju formom sa metodom post,
		//index elemenata u nizu $_POST je jednak atributu name input elementa
		//Proveravamo da li postoji neki od indexa i pozivamo funkciju ako postoji

		if(array_key_exists('hxh', $_POST)){
			buttonClick('hxh');
		}
		if(array_key_exists('rick', $_POST)){
			buttonClick('rick');
		}
		if(array_key_exists('juju', $_POST)){
			buttonClick('juju');
		}
		if(array_key_exists('warcraft', $_POST)){
			buttonClick('warcraft');
		}
		if(array_key_exists('all', $_POST)){
			$result = $db->query("SELECT * FROM majice");
 			ispisiSadrzaj($result);
 			$result = $db->query("SELECT * FROM duks"); 
 			ispisiSadrzaj($result);
 			$result = $db->query("SELECT * FROM misc"); 
 			ispisiSadrzaj($result);
		}
		/*$result = $db->query("SELECT * FROM majice");
 		ispisiSadrzaj($result);
 		$result = $db->query("SELECT * FROM duks"); 
 		ispisiSadrzaj($result);
 		$result = $db->query("SELECT * FROM misc"); 
 		ispisiSadrzaj($result);*/

 		crud();

 		echo '</div>';
		require("footer.html");
	?>
	
	</body>
</html>
