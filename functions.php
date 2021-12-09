<?php 

	/* Element baze se pretvara u niz informaciaj i onda se u odgovarajucem formatu ispisuje*/

	function ispisiSadrzaj($result){
		while($row = $result->fetch_assoc()) {
			echo "<div class='item' ><br> ID: " . $row["ID"] . "<br> Cena: " .$row["Cena"] . "€<br>" . "<image class='slika' src='" . $row["Slika"] . "' width='auto' height='250' >" . "<button class='buyBtn'>Buy</button>" . "</div>";
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