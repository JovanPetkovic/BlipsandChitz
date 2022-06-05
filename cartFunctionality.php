<?php

error_reporting(E_ALL);
require "ShoppingCart.php";
require "ShopItem.php";
session_start();



if(!isset($_SESSION["cart"]))
    {
        $_SESSION["cart"] = new ShoppingCart();
    }
if(isset($_GET['id'])&&isset($_SESSION['cart']))
    {
        $newItem = new ShopItem($_GET['id'],$_GET['cena'],$_GET['img']);
        $_SESSION["cart"]->addToCart($newItem);
    }   


if(isset($_GET['clear']))
    {
        $_SESSION['cart']->clear();
    }







?>