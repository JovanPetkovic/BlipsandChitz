<?php
namespace app\Models;
use Templates;

class Item
{

    private static $db;
    private static $list = array();
    private static $keyNumber = 0;

    public function display(){
        include "../Templates/Components/Item.php";
    }

    public static function setDB($dBase)
    {
        Item::$db = $dBase;
    }

    public static function initItemList()
    {
        $result = Item::$db->query("SELECT * FROM proizvodi");
        while($row = $result->fetch_assoc())
        {
            array_push(Item::$list, new Item($row));
        }
    }

    public function __construct($item)
    {
        $this->id = $item['ID'] ?? null;
        $this->price = $item['Cena'] ?? null;
        $this->image = $item['Slika'] ?? null;
        $this->category = $item['kategorija_id'] ?? null;
        $this->type = $item['tip_id'] ?? null;
        $this->discount = $item['popust'] ?? null;
        Item::$list[Item::$keyNumber] = $this;
        $this->key = Item::$keyNumber;
        Item::$keyNumber++;
    }

    public static function addToDB($cena, $img, $kat, $tip)
    {
        $result = Item::$db->query("INSERT INTO proizvodi (Cena,Slika,kategorija_id,tip_id) VALUES ($cena, '$img', $kat, $tip)");
        $item['ID'] = Item::$db->insert_id;
        $item['Cena'] = $cena;
        $item['Slika'] = $img;
        $item['kategorija_id'] = $kat;
        $item['tip_id'] = $tip;
    }

    public function deleteItem()
    {
        if(!empty($_POST['id']))
        {
            $result = Item::$db->query("DELETE FROM proizvodi WHERE ID=" . $_POST['id']);
            if($result)
            {
                echo "<h1>Success</h1>";
            }
            else
            {
                echo "<h1>Fail</h1>";
            }
        }
    }
    public static function update($db)
    {
        include_once "../Templates/Components/updateForm.php";
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

    public function updateItem($price, $img, $category, $type)
    {
        $this->image = $img;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $result = Item::$db->query("UPDATE proizvodi SET Cena = $this->price, Slika = '$this->image', kategorija_id = $this->category,
                                    tip_id = $this->type WHERE ID = $this->id");
    }

    public static function getCategories()
    {
        $arr = array();
        $result = Item::$db->query("SELECT * FROM kategorije");
        while($row = $result->fetch_assoc())
            array_push($arr, $row);
        return $arr;
    }

    public static function getTypes()
    {
        $arr = array();
        $result = Item::$db->query("SELECT * FROM tip");
        while($row = $result->fetch_assoc())
            array_push($arr, $row);
        return $arr;

    }

    public static function getItemByID($id)
    {
        $key = array_search($id, array_column(Item::$list, 'id'));
        return Item::$list[$key];
    }

    public function delete()
    {
        unset(Item::$list[$this->key]);
        $result = Item::$db->query("DELETE FROM proizvodi WHERE ID = $this->id");
        return $result;
    }

}

