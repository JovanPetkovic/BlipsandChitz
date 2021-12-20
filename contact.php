<?php 
	error_reporting(E_ALL);
	$mysql_server = "localhost";	
	$mysql_user = "root";
	$mysql_password = "banana554";
	$mysql_db = "blips_and_chitz";
	$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);

	$name = $_GET['name'];
	$email = $_GET['email'];
	$text = $_GET['text'];

	$str = "INSERT INTO kontakt (ime, email, poruka) VALUES ('$name', '$email', '$text') ";

	$result = $db->query($str);
	if(!$result){
		echo $db->error;
		echo '<br>' . $str;
	}

?>