<?php

$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "banana554";
$mysql_db = "blips_and_chitz";
$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db) or die("could not connect to db");

spl_autoload_register(function($class)
{
    $path = dirname(dirname(__DIR__)) . '/' . str_replace('\\', '/', $class) . ".php";
    include $path;
});

use app\Models\Contact;
use app\Models\Item;
Item::setDB($db);
Item::initItemList();
Contact::setDB($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blips and Chitz</title
    <base href="/">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/margin.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/header.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/footer.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/items.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/crud.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/main.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/contact.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/cart.css">
	<link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/BlipsandChitz/public/css/add.css">
</head>
<body>
	<div id="main">
		<img src="/BlipsandChitz/img/ball.webp" id="ball">
		<div class="links">
			<a href="/BlipsandChitz">Home</a>
			<a href="/BlipsandChitz/shop">Shop</a>
		</div>
		<div class="links">
			<a href="/BlipsandChitz/add">Add</a>
			<a href="/BlipsandChitz/contact">Contact</a>
		</div>
	</div>
    <div id="output">
        <h1 id="succ">Success</h1>
        <h1 id="fail">Fail</h1>
    </div>