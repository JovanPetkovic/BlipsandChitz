<?php
$request = $_SERVER['REQUEST_URI'];
include $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/Templates/header.php";
switch ($request)
{
    case '/BlipsandChitz/':
        include_once "../Templates/home.php";
        break;
    case '/BlipsandChitz/shop':
        include_once "../Templates/Shop.php";
        break;
    default:
        echo "Error 404";
        break;
}