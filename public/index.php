<?php

$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/Components/header.php";
use Modules\Item;
use Modules\Contact;
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
    case '/BlipsandChitz/contact':
        if(count($_POST) == 4 ?? false)
        {
            $contact = new Contact($_POST['name'], $_POST['email'], $_POST['text']);
            echo $contact->pushToDB($db);
            echo "<h1> Success </h1>";
        }
        else {
            include_once '../Templates/Contact.html';
        }
        break;
    default:
        echo "Error 404";
        break;
}

include "../Templates/Components/footer.html";