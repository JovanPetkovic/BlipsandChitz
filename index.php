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
	</head>
	<body><?php 
	 	
		function ispisiSadrzaj($result){
			while($row = $result->fetch_assoc()) {
	    		echo "<div class='item' ><br> ID: " . $row["id"] . "<br> Ime: " . $row["ime"] . "<br> Cena: " .$row["cena"] . "€<br>" . "<image class='slika' src='" . $row["slika"] . "' width='auto' height='250' >" . "<button class='buyBtn'>Buy</button>" . "</div>";
	 		}
 		}

	 	require("header.html");
		echo '<div class="items">';
		$mysql_server = "localhost";	
		$mysql_user = "root";
		$mysql_password = "banana554";
		$mysql_db = "blips_and_chitz";
		$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);
		
		$result = $db->query("SELECT * FROM majice");
 		ispisiSadrzaj($result);
 		$result = $db->query("SELECT * FROM duks"); 
 		ispisiSadrzaj($result);
 		$result = $db->query("SELECT * FROM misc"); 
 		ispisiSadrzaj($result);

 		echo '</div>';

		require("footer.html");
	?>
	</body>
</html>
