<?php
error_reporting(E_ALL);
	$mysql_server = "localhost";	
	$mysql_user = "root";
	$mysql_password = "banana554";
	$mysql_db = "blips_and_chitz";
	$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);

var_dump($_POST);

if(isset($_POST['fcena'])){
	if(formCheck()){
		productPush($db);
		echo "fajl poslat";
	}
	else{
		echo "Proizvod se nije ubacio u sistem";
	}
	$db->close();
}


//Funkcija za ubacivanje fajla u bazu

	function productPush($db){
		$slika = 'img/' . basename($_FILES["fimg"]["name"]); //putanja gde ce se sacuvati fajl
		$img = $_FILES['fimg']['tmp_name'];//trenutna putanja fajla
		move_uploaded_file( $img,$slika) or die( "Could not copy file!");
		$cena = floatval($_POST['fcena']);
		$kategorija = $_POST['kategorija'];
		$tip = $_POST['tip'];
		$result = $db->query("INSERT INTO proizvodi (Cena,Slika,kategorija_id,tip_id) VALUES ($cena, '$slika', $kategorija, $tip)");

		if($result){
			echo " Success";
		}
		else{
			echo $db->error;;
		}
	}

//Funkcija proverava formu

	function formCheck() : int{	

		//Proverava da li je fajl zapravo slik
		$check  = exif_imagetype($_FILES['fimg']['tmp_name']);
		if($check == false){
			echo 'file is not an image' . '<br>';
			return 0;
		}

		$cenaTip = floatval($_POST['fcena']);
		if(!$cenaTip){
			echo 'Pogresno uneta cena';
			return 0;
		}

		return 1;
	}


?>