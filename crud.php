

<?php

	//Glavna funkcija

	function crud($db){
		error_reporting(E_ALL);
		menu($db);
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
?>	
	
<?php
	//Funkcija za prikazivanje forme
	function formDisplay($db){
		// Kategorija prikazuje u koji zanr pripadaju proizvodi(HxH, Jujutsu...)
		// Tip predstavlja koji je tip odece u pitanju(majica, duks...)
		$kategorija = $db->query("SELECT * FROM kategorije");
		$tip = $db->query("SELECT * FROM tip");	
?>
		<form method="post" id="addnew" enctype="multipart/form-data" >
			<label for="fimg">Image Source: </label>
			<input type="file" name="fimg" required><br>
			<label for="fcena">Cena: </label>
			<input type="text" name="fcena" required><br>
			<input type="submit" name="fsubmit" value="Submit">
			<select name="kategorija">
				
	<?php	
			// Uzimamo i ispisujemo imena kategorija proizvoda u dropdown
			while($row = $kategorija->fetch_assoc()){
	?>
				<option value="<?php echo $row['kategorija_id']; ?>"><?php echo $row['imeKategorije']?></option>
	<?php   
			}
	?>
			</select>
			<select name="tip">
	<?php
				//uzimamo i ispisujemo tip proizvoda u dropdown
				while($row = $tip->fetch_assoc()){
	?>
				<option value="<?php echo $row['tip_id'];?>"><?php echo $row['ime'];?></option>
			<?php
				}
			?>
			</select>
		</form>
	<?php	
		}
	?>
	<script type="text/javascript" src="js/crud.js"></script>
<?php
	//Funkcija za ubacivanje fajla u bazu

	function productPush($db){
		$slika = 'img/' . basename($_FILES["fimg"]["name"]); //putanja gde ce se sacuvati fajl
				$img = $_FILES['fimg']['tmp_name'];//trenutna putanja fajla
				move_uploaded_file( $img,$slika) or die( "Could not copy file!");
		$cena = floatval($_POST['fcena']);
		echo $cena;
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
			$qry = 'DELETE FROM proizvodi WHERE ID=' . $_POST['deletebtn'];
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

	//Daje funkcionalnost meniju

	function menu($db){

			echo '<form method="post" id="select">
				<input type="submit" name="hxh" value="Hunter X Hunter">
				<input type="submit" name="rick" value="Rick & Morty">
				<input type="submit" name="juju" value="Jujutsu Kaisen">
				<input type="submit" name="warcraft" value="WarCraft">
				<input type="submit" name="all" value="All">
				<input type="submit" name="majice" value="Majice">
				<input type="submit" name="duks" value="Duksevi">
				<input type="submit" name="razno" value="Razno">
				</form>	';
			echo '<div class="items">';

			if(array_key_exists('hxh', $_POST)){
				buttonClick1(1,$db);
			}
			if(array_key_exists('rick', $_POST)){
				buttonClick1(4,$db);
			}
			if(array_key_exists('juju', $_POST)){
				buttonClick1(3,$db);
			}
			if(array_key_exists('warcraft', $_POST)){
				buttonClick1(2,$db);
			}
			if(array_key_exists('all', $_POST)){
				$result = $db->query("SELECT * FROM proizvodi");
	 			ispisiSadrzaj($result);
			}

			if(array_key_exists('majice', $_POST)){
				buttonClick2(2, $db);
			}
			if(array_key_exists('duks', $_POST)){
				buttonClick2(1, $db);
			}
			if(array_key_exists('razno', $_POST)){
				buttonClick2(3, $db);
			}
		}
?>