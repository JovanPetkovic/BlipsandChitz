<?php 

	/* Element baze se pretvara u niz informaciaj i onda se u odgovarajucem formatu ispisuje*/

	function ispisiSadrzaj($result){
		while($row = $result->fetch_assoc()) {
			echo "<form method='post' class='item' ><input name='id' id='productID' value='" . $row["ID"] . "'/><input type='submit' name='deletebtn' class='delete' value='X'/><input type='submit' name='updatebtn' class='update' value='U'/>" . "<br> <p class='cena' value='" .$row["Cena"]. "'>Cena: " .$row["Cena"] . "€</p><br>" . "<image class='slika' src='../" . $row["Slika"] . "' width='auto' height='250' >" . "<button type='submit' name='addToCart' class='buyBtn'>Add to Cart</button>" . "</form>";
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