<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "banana554";
$mysql_db = "blips_and_chitz";
$db = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db) or die("could not connect to db");

spl_autoload_register(function($class)
{
    $path = dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . ".php";
    include $path;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blips and Chitz</title
    <base href="/">
	<link rel="stylesheet" type="text/css" href="public/css/margin.css">
	<link rel="stylesheet" type="text/css" href="public/css/header.css">
	<link rel="stylesheet" type="text/css" href="public/css/footer.css">
	<link rel="stylesheet" type="text/css" href="public/css/items.css">
	<link rel="stylesheet" type="text/css" href="public/css/crud.css">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<link rel="stylesheet" type="text/css" href="public/css/contact.css">
	<link rel="stylesheet" type="text/css" href="public/css/cart.css">
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
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