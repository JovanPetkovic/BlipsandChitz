<?php

	//Glavna funkcija

	function crud($db){
		error_reporting(E_ALL);
		formDisplay($db);
		if(isset($_POST['fsubmit'])){
			if(formCheck()){
				productPush($db);
			}
			else{
				echo "Proizvod se nije ubacio u sistem";
				return;
			}
		}
		productDelete($db);
		productUpdate($db);
	}
	

	//Funkcija proverava formu

	function formCheck() : int{	

		//Proverava da li je fajl zapravo slika

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
	
	//Funkcija za prikazivanje forme

	function formDisplay($db){
		$kategorija = $db->query("SELECT * FROM kategorije");
		$tip = $db->query("SELECT * FROM tip");	
		echo'<form method="post" id="addnew" enctype="multipart/form-data">
			<label for="fimg">Image Source: </label>
			<input type="file" name="fimg" required><br>
			<label for="fcena">Cena: </label>
			<input type="text" name="fcena" required><br>
			<input type="submit" name="fsubmit" value="Submit">
			<select name="kategorija">';
			// Uzimamo i ispisujemo imena kategorija proizvoda u dropdown
			while($row = $kategorija->fetch_assoc()){
				echo  '<option value="' . $row['kategorija_id'] . '">'. $row['imeKategorije'] . '</option>';
			}
			echo '</select>';
			echo '<select name="tip">';
			//uzimamo i ispisujemo tip proizvoda u dropdown
			while($row = $tip->fetch_assoc()){
				echo  '<option value="' . $row['tip_id'] . '">'. $row['ime'] . '</option>';
			}
			echo '</select>';
			echo '</form>';
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


	//Funckija za brisanje fajla

	function productDelete($db){
		error_reporting(E_ALL);
		if(isset($_POST['deletebtn'])){
			$qry = 'DELETE FROM proizvodi WHERE ID=' . $id;
			$db->query($qry);
		}
		else{
			echo $db->error;
		}
	}

	function productUpdate($db){	
		if(isset($_POST['updatebtn'])){
			$id = $_POST['updatebtn'];
			echo '<form method="POST" name="updateForm" id="updateForm">';
			echo '<input type="text" name="novaCena">';
			echo '<input type="submit" name="updateCena" value="' . $id . '">';
			echo '</form>';
			ispisiSadrzaj($db->query("SELECT * FROM proizvodi"));
		}
		if(isset($_POST['novaCena'])&& isset($_POST['updateCena'])){
			$cena = $_POST['novaCena'];
			$qry = 'UPDATE proizvodi SET Cena=' . $cena . ' WHERE ID =' . $_POST['updateCena'];
			$db->query($qry);
			ispisiSadrzaj($db->query("SELECT * FROM proizvodi"));
		}
	}

?>