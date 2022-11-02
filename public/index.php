<?php
$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/header.php";
switch ($request)
{
    case '/BlipsandChitz/':
        include_once "../Templates/Home.php";
        break;
    case '/BlipsandChitz/shop':
        include_once "../Templates/Shop.php";
        break;
    case '/BlipsandChitz/add':
        include_once "../Templates/AddItem.php";
        break;
    default:
        echo "Error 404";
        break;
}