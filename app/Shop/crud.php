

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
			ispisiSadrzaj($db->query("SELECT * FROM proizvodi"),"../");
		}
		if(isset($_POST['novaCena'])&& isset($_POST['updateCena'])){
			$cena = $_POST['novaCena'];
			$qry = 'UPDATE proizvodi SET Cena=' . $cena . ' WHERE ID =' . $_POST['updateCena'];
			$db->query($qry);
			ispisiSadrzaj($db->query("SELECT * FROM proizvodi"),"../");
		}
	}

	//Daje funkcionalnost meniju

	function menu($db){

			echo '<button id="filter-btn"></button>
				<div id="select">
					<form method="post">
					<div>
						<label>Hunter X Hunter</label>
						<input type="checkbox" name="tip[]" value="1">
					</div>
					<div>
						<label>Rick & Morty</label>
						<input type="checkbox" name="tip[]" value="4">
					</div>
					<div>
						<label>Jujutsu Kaisen</label>
						<input type="checkbox" name="tip[]" value="3">
					</div>
					<div>
						<label>WarCraft</label>
						<input type="checkbox" name="tip[]" value="2">
					</div>
					<div>
						<label>Majice</label>
						<input type="checkbox" name="kategorija[]" value="2">
					</div>
					<div>
						<label>Duksevi</label>
						<input type="checkbox" name="kategorija[]" value="1">
					</div>
					<div>
						<label>Razno</label>
						<input type="checkbox" name="kategorija[]" value="3">
					</div>
					<div>
						<input type="submit" id="filter-submit">
					</div>
					</form>	
				</div>
				<div id="hero">';
			echo '<div class="items">';


			if(array_key_exists('kategorija', $_POST) or array_key_exists('tip',
				$_POST))
			{
				$selectKategorija = $_POST['kategorija'] ?? null;
				$selectTip = $_POST['tip'] ?? null;
				buttonClick($selectKategorija,$selectTip, $db);
			}
			else{
				buttonClick1($db);
			}
			echo "</div></div>";
		}
?>