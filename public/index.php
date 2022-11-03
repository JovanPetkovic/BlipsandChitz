<?php

$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/header.php";
use Modules\Item;
switch ($request)
{
    case '/BlipsandChitz/':
        include_once "../Templates/Home.php";
        break;
    case '/BlipsandChitz/shop':
        include_once "../Templates/Shop.php";
        break;
    case '/BlipsandChitz/add':
        if(count($_POST)==4 ?? false)
        {
            Item::addItemToDB($db);
        }
        else
        {
            include_once "../Templates/AddItem.php";
        }
        break;
    default:
        echo "Error 404";
        break;
}

include "../Templates/footer.html";