<?php 

	/* Element baze se pretvara u niz informaciaj i onda se u odgovarajucem formatu ispisuje*/

	function ispisiSadrzaj($result){
		while($row = $result->fetch_assoc()) {
			echo "<form method='post' class='item' ><input name='id' id='productID' value='" . $row["ID"] . "'/>" . " <p class='cena' value='" .$row["Cena"]. "'>" .$row["Cena"] . "€</p>" . "<image class='slika' src='../" . $row["Slika"] . "' width='auto' height='250' >" . "<button type='submit' name='addToCart' class='buyBtn'>Add to Cart</button><input type='submit' name='deletebtn' class='delete' value='Delete'/><input type='submit' name='updatebtn' class='update' value='Update'/>" . "</form>";
		}
	}	

	/*Uspostavlja se konekcija sa bazom i skuplja se sadrzaj uz pomoc stringa $tag
	  koji se povezuje sa kolonom tag u bazi i onda se zove funkcija ispisiSadrzaj()*/

	function buttonClick1($db){
		$result = $db->query("SELECT * FROM proizvodi");
		ispisiSadrzaj($result);
	}


	function buttonClick($kat,$tip, $db)
	{
		$fin = false;
		if(!is_null($kat) && !is_null($tip) && !$fin)
		{
			$result = $db->query("SELECT * FROM proizvodi WHERE kategorija_id IN("
			. implode(',',$kat) . ") AND tip_id IN("
			. implode(',',$tip) . ")" );
			$fin = true;
		}
		if(!is_null($kat)&& !$fin)
		{
			$result = $db->query("SELECT * FROM proizvodi WHERE kategorija_id IN("
			. implode(',',$kat) . ")" );
			$fin = true;
		}
		if(!is_null($tip)&&!$fin)
		{
			$result = $db->query("SELECT * FROM proizvodi WHERE tip_id IN("
			. implode(',',$tip) . ")" );
			$fin=true;
		}
		if($fin)
		{
			ispisiSadrzaj($result);
			return;		
		}
		echo $result->error;
	}
?>	