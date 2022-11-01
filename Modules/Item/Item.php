<?php
namespace Modules;
use Templates;

class Item
{

    public function display(){
        include ("Templates/Item.php");
    }


    public function __construct($item)
    {
        $this->id = $item['id'] ?? null;
        $this->price = $item['cen'] ?? null;
        $this->image = $item['slika'] ?? null;
        $this->category = $item['kategorija_id'] ?? null;
        $this->type = $item['tip_id'] ?? null;
        $this->discount = $item['popust'] ?? null;
     }

}

