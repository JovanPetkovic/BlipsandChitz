<?php

use Modules\Item;

class Shop
{
    static $Items = Array();

    public static function getItems($db)
    {
        $result = $db->query("SELECT * FROM proizvodi");
        while($row = $result->fetch_assoc())
        {
            array_push($items,Modules\Item::Item($row));
        }
    }

    public static function ispisiSadrzaj($result, $str)
    {
        foreach (Shop->Items as $item)
        {

        }
    }

    public static function filterItems($kat,$tip, $db)
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
            ispisiSadrzaj($result,"../");
            return;
        }
        echo $result->error;
    }

}
