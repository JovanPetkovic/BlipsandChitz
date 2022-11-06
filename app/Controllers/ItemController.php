<?php
namespace app\Controllers;
use app\Models\Item;
class ItemController
{
    public static function deleteItem()
    {
        $id = intval($_POST['id']);
        $item = Item::getItemByID($id) ?? false;
        if($item)
        {
            $result = $item->delete();
        }
        header("Location: /BlipsandChitz/shop");

    }
    public static function updateItem()
    {
        $id = intval($_POST['id']);
        $item = Item::getItemByID($id);

    }
    public static function addItem()
    {
        $cena = floatval($_POST['fcena']);
        $img = dirname(dirname(__DIR__)) . '/public/img/' . basename($_FILES["fimg"]["name"]);
        $slika = $_FILES['fimg']['tmp_name'];
        move_uploaded_file( $slika,$img) or die( "Could not copy file!");
        $kat = intval($_POST['kategorija']);
        $tip = intval($_POST['tip']);
        $img = 'img/' . basename($_FILES["fimg"]["name"]);
        Item::addToDB($cena, $img, $kat, $tip);
    }

    public static function showItemForm()
    {
        include_once "../Templates/AddItem.php";
    }
}