<?php

class ShoppingCart {
	
	private $cartItems;

	public function addToCart($item){
		if(is_null($item)){
			echo "ITEM IS NULL";
			return;
		}
		array_push($this->cartItems, $item);
		$this->start();
	}

	public function start() {
		
		if(!empty($this->cartItems))
			foreach ($this->cartItems as $item) {
				$imgLink = $item->getImg();
				$cena = $item->getCena();
				var_dump($item);
				echo "<div class='cartItem'>
						<img src='" . $imgLink . "' />" .
						"<p>" . $cena . "</p>" . 
					 "</div>"; 
			}
	}

	public function __construct(){
		$this->cartItems = array();
		$this->start();
	}


}	



?>