

<?php

	//Glavna funkcija

	function crud($db){
		error_reporting(E_ALL);
		menu($db);
		//formDisplay($db);
		productDelete($db);
		productUpdate($db);
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
		<form method="post" id="addnew" enctype="multipart/form-data">
			<div>
				<label for="fimg">Image Source: </label>
				<input type="file" name="fimg" required id="content-file">
			</div>
			<div>
				<label for="fcena">Cena: </label>
				<input type="text" name="fcena" required id="content-cena">
			</div>
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
			<input type="submit" name="fsubmit" value="Submit">
		</form>
	<?php	
		}
	?>
	<script type="text/javascript" src="/BlipsandChitz/js/crud.js"></script>
<?php


	//Funckija za brisanje fajla

	function productDelete($db){
		error_reporting(E_ALL);
		if(isset($_POST['deletebtn'])){
			$qry = 'DELETE FROM proizvodi WHERE ID=' . $_POST['id'];
			$db->query($qry);
		}
		else{
			echo $db->error;
		}
	}

	function productUpdate($db){	
		if(isset($_POST['updatebtn'])){
			$id = $_POST['id'];
			echo '<form method="POST" name="updateForm" id="updateForm">';
			echo '<input type="text" name="novaCena" value="unesite cenu">';
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
				<div>
					<label>Hunter X Hunter</label>
					<input type="checkbox" name="tip" value="1">
				</div>
				<div>
					<label>Rick & Morty</label>
					<input type="checkbox" name="tip" value="4">
				</div>
				<div>
					<label>Jujutsu Kaisen</label>
					<input type="checkbox" name="tip" value="3">
				</div>
				<div>
					<label>WarCraft</label>
					<input type="checkbox" name="tip" value="2">
				</div>
				<div>
					<label>All</label>
					<input type="checkbox" name="all" value="All">
				</div>
				<div>
					<label>Majice</label>
					<input type="checkbox" name="kategorija" value="2">
				</div>
				<div>
					<label>Duksevi</label>
					<input type="checkbox" name="kategorija" value="1">
				</div>
				<div>
					<label>Razno</label>
					<input type="checkbox" name="kategorija" value="3">
				</div>
				<div>
					<input type="submit">
				</div>
				</form>	';
			echo '<div class="items">';

			if(array_key_exists('kategorija', $_POST) or array_key_exists('tip',
				$_POST))
			{
				$selectKategorija = $_POST['kategorija'];
				$selectTip = $_POST['tip'];
				buttonClick($selectKategorija,$selectTip, $db);
			}

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
			echo "</div>";
		}
?>