<?php
namespace Modules;
use Templates;

class Item
{

    public function display(){
        include "../Templates/Components/Item.php";
    }


    public function __construct($item)
    {
        $this->id = $item['ID'] ?? null;
        $this->price = $item['Cena'] ?? null;
        $this->image = $item['Slika'] ?? null;
        $this->category = $item['kategorija_id'] ?? null;
        $this->type = $item['tip_id'] ?? null;
        $this->discount = $item['popust'] ?? null;
    }

    public function addItemToDB()
    {

    }
    public function removeItemFromDB()
    {

    }

    /**
     * @return mixed|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed|null
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|null
     */
    public function getImage()
    {
        $path = '/BlipsandChitz/public/' . $this->image;
        return $path;
    }

    /**
     * @return mixed|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed|null
     */
    public function getType()
    {
        return $this->type;
    }

    public static function getCategories($db)
    {
        $arr = array();
        $result = $db->query("SELECT * FROM kategorije");
        while($row = $result->fetch_assoc())
            array_push($arr, $row);
        return $arr;
    }

    public static function getTypes($db)
    {
        $arr = array();


    }

}

