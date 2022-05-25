<?php



class ShopItem{

	private int $id;
	private float $cena;
	private string $imgLink;

	public function __construct($id, $cena, $imgLink){
		$this->id = $id;
		$this->cena = $cena;
		$this->imgLink = $imgLink;
	}

	public function getId(){
		if(isset($this->id))
			return $this->id;
	}

	public function getCena(){
		if(isset($this->cena))
			return $this->cena;
	}

	public function getImg(){
		if(isset($this->imgLink))
			return $this->imgLink;
	}


}



?>
