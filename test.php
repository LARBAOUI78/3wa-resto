<?php
session_start();

print_r($_SESSION);


// initialisé le panier
$_SESSION['cart'] = [];


$productId = 1;
$row = [];
$row['id'] = $productId;
$row['quantity'] = 3;

$_SESSION['cart'][$productId] = $row;


$productId = 3;
$row = [];
$row['id'] = $productId;
$row['quantity'] = 2;

$_SESSION['cart'][$productId] = $row;

print_r($_SESSION);

$product = 3;
$quantity = 4;

if (isset($_SESSION['cart'][$productId])) {
	$_SESSION['cart'][$productId]['quantity'] += $quantity; 
} else {
	$row = [];
	$row['id'] = $productId;
	$row['quantity'] = 2;
	$_SESSION['cart'][$productId] = $row;
}

print_r($_SESSION);