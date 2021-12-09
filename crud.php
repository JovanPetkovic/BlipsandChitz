<?php

	//Glavna funkcija

	function crud($db){
		formDisplay($db);
		if(isset($_POST['fsubmit'])){
			if(formCheck()){
				$target_file = 'uploads/' . basename($_FILES["fimg"]["name"]);
				error_reporting(E_ALL);
				move_uploaded_file( $_FILES['fimg']['tmp_name'],$target_file) or die( "Could not copy file!");
				$img = $_FILES['fimg']['tmp_name'];
				$cena = floatval($_POST['fcena']);
				$db->query("INSERT INTO  ");
				echo "Uspesno unet proizvod";
			}
			else{
				echo "Proizvod se nije ubacio u sistem";
				return;
			}
		}
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
		$kategorija = $db->query("SELECT imeKategorije FROM kategorije");
		$tip = $db->query("SELECT ime FROM tip");	
		echo'<form method="post" id="addnew" enctype="multipart/form-data">
			<label for="fimg">Image Source: </label>
			<input type="file" name="fimg" required><br>
			<label for="fcena">Cena: </label>
			<input type="text" name="fcena" required><br>
			<input type="submit" name="fsubmit" value="Submit">
			<select>';
			// Uzimamo i ispisujemo imena kategorija proizvoda u dropdown
			while($row = $kategorija->fetch_assoc()){
				echo  '<option>' . $row['imeKategorije'] . '</option>';
			}
			echo '</select>';
			echo '<select>';
			//uzimamo i ispisujemo tip proizvoda u dropdown
			while($row = $tip->fetch_assoc()){
				echo  '<option>' . $row['ime'] . '</option>';
			}
			echo '</select';
			echo '</form>';
	}


?>