<?php 

	/* Element baze se pretvara u niz informaciaj i onda se u odgovarajucem formatu ispisuje*/

	function ispisiSadrzaj($result){
		while($row = $result->fetch_assoc()) {
			echo "<form method='post' class='item' ><input type='submit' name='deletebtn' class='delete' value='" . $row["ID"] . "'/><input type='submit' name='updatebtn' class='update' value='" . $row["ID"] . "'/><br> ID: " . "<br> Cena: " .$row["Cena"] . "€<br>" . "<image class='slika' src='" . $row["Slika"] . "' width='auto' height='250' >" . "<button class='buyBtn'>Buy</button>" . "</form>";
		}
	}	

	/*Uspostavlja se konekcija sa bazom i skuplja se sadrzaj uz pomoc stringa $tag
	  koji se povezuje sa kolonom tag u bazi i onda se zove funkcija ispisiSadrzaj()*/

	function buttonClick1($tag,$db){
		$result = $db->query("SELECT * FROM proizvodi WHERE tip_id = '$tag'");
		ispisiSadrzaj($result);
	}

	function buttonClick2($tag,$db){
		$result = $db->query("SELECT * FROM proizvodi WHERE kategorija_id = '$tag'");
		ispisiSadrzaj($result);
	}
?>	