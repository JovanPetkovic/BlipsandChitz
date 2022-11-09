<?php

$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/Components/header.php";
use app\Controllers\ItemController;
use app\Controllers\ContactController;
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
        elseif(!empty($_POST['edit']))
        {
            ItemController::editItem();
        }
        elseif(!empty($_POST['fsubmit']))
        {
            ItemController::addItem();
        }
        elseif(!empty($_POST['update']))
        {
            ItemController::updateItem();
        }
        else{
            echo "error 404";
        }
        break;
    case $baseUrl . '/add':
        ItemController::showItemForm();
        break;
    case $baseUrl . '/contact':
        if(!empty($_POST['submitContact']))
        {
            ContactController::addContact();
        }
        else
        {
            ContactController::showForm();
        }
        break;
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
    default:
        echo "Error 404";
        break;
}

include "../Templates/Components/footer.html";