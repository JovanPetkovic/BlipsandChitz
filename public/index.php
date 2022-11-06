<?php

$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/Components/header.php";
use app\Controllers\ItemController;
use app\Models\Contact;
use app\Models\Shop;

$baseUrl = '/BlipsandChitz';
switch ($request)
{
    case $baseUrl . '/':
        include_once "../Templates/Home.php";
        break;
    case $baseUrl . '/shop':
        include_once "../Templates/Shop.php";
        break;
    case $baseUrl . '/item':
        if(!empty($_POST['delete']))
        {
            ItemController::deleteItem();
        }
        elseif(!empty($_POST['update']))
        {
            ItemController::updateItem();
        }
        elseif(!empty($_POST['fsubmit']))
        {
            ItemController::addItem();
        }
        else{
            echo "error 404";
        }
    case $baseUrl . '/add':
        ItemController::showItemForm();
        break;
//    case $baseUrl . '/contact':
//        if(count($_POST) == 4 ?? false)
//        {
//            $contact = new Contact($_POST['name'], $_POST['email'], $_POST['text']);
//            echo $contact->pushToDB($db);
//            echo "<h1> Success </h1>";
//        }
//        else {
//            include_once '../Templates/Contact.html';
//        }
//        break;
//    case $baseUrl . '/item':
//        if(!empty($_POST['delete']))
//        {
//            Item::deleteItem($db);
//        }
//        if(!empty($_POST['update']))
//        {
//            include_once "../Templates/Shop.php";
//            Item::update($db);
//        }
//        break;
//    case $baseUrl . '/update':
//        $id = $_POST['id']??false;
//        if($id)
//        {
//            $result = $db->query("UPDATE proizvodi SET Cena =" . $_POST["fcena"] . " WHERE ID = $id");
//            echo $result;
//        }
//        break;
    default:
        echo "Error 404";
        break;
}

include "../Templates/Components/footer.html";