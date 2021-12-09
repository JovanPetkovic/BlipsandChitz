<?php 

	/* Element baze se pretvara u niz informaciaj i onda se u odgovarajucem formatu ispisuje*/

	function ispisiSadrzaj($result){
		while($row = $result->fetch_assoc()) {
			echo "<div class='item' ><br> ID: " . $row["id"] . "<br> Ime: " . $row["ime"] . "<br> Cena: " .$row["cena"] . "€<br>" . "<image class='slika' src='" . $row["slika"] . "' width='auto' height='250' >" . "<button class='buyBtn'>Buy</button>" . "</div>";
		}
	}	

	/*Uspostavlja se konekcija sa bazom i skuplja se sadrzaj uz pomoc stringa $tag
	  koji se povezuje sa kolonom tag u bazi i onda se zove funkcija ispisiSadrzaj()*/

	function buttonClick($tag){
		$data = new mysqli("localhost","root","banana554","blips_and_chitz");
		$result = $data->query("SELECT * FROM majice WHERE tag = '$tag'");
		ispisiSadrzaj($result);
		$result = $data->query("SELECT * FROM duks WHERE tag = '$tag'");
		ispisiSadrzaj($result);
		$result = $data->query("SELECT * FROM misc WHERE tag = '$tag'");
		ispisiSadrzaj($result);
	}
?>	