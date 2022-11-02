<?php

namespace Modules;

use Modules\Item;

class Shop
{
    static $items = array();

    public static function getItems($db)
    {
        $result = $db->query("SELECT * FROM proizvodi");
        while($row = $result->fetch_assoc())
        {
            array_push(Shop::$items,new Item($row));
        }
    }

    public static function ispisiSadrzaj()
    {
        if(isset($_POST['tip'])||isset($_POST['kategorija']))
        {
            Shop::filterItems($_POST['kategorija'] ?? null, $_POST['tip'] ?? null);
        }
        else {
            foreach (Shop::$items as $item) {
                $item->display();
            }
        }
    }

    public static function filterItems($kat,$tip)
    {
        $gotCat = isset($kat);
        $gotType = isset($tip);
        foreach (Shop::$items as $item)
        {
            $print = false;
            if($gotCat)
            {
                if($gotType)
                {
                    $print = in_array($item->category, $kat)&&in_array($item->type, $tip);
                }
                else
                {
                    $print = in_array($item->category, $kat);
                }
            }
            else
            {
                if($gotType)
                {
                    $print = in_array($item->type, $tip);
                }
            }
            if($print)
            {
                $item->display();
            }
        }
    }



}
