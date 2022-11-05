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

    public static function addItemToDB($db)
    {
        $cena = floatval($_POST['fcena']);
        $img = dirname(__DIR__) . '/public/img/' . basename($_FILES["fimg"]["name"]);
        $slika = $_FILES['fimg']['tmp_name'];
        move_uploaded_file( $slika,$img) or die( "Could not copy file!");
        $kat = intval($_POST['kategorija']);
        $tip = intval($_POST['tip']);
        $img = 'img/' . basename($_FILES["fimg"]["name"]);
        $result = $db->query("INSERT INTO proizvodi (Cena,Slika,kategorija_id,tip_id) VALUES ($cena, '$img', $kat, $tip)");
        echo $db->error;
    }

    public static function deleteItem($db)
    {
        if(!empty($_POST['id']))
        {
            $result = $db->query("DELETE FROM proizvodi WHERE ID=" . $_POST['id']);
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
        $result = $db->query("SELECT * FROM tip");
        while($row = $result->fetch_assoc())
            array_push($arr, $row);
        return $arr;

    }

}

