<?php

//Топ 4 товара
//Распродажа
//Количество товаров в корзине

$actions = ['index', 'shop'];
$action = isset($_GET['page']) ? $_GET['page'] : 'index';
if (!in_array($action, $actions)) { 
    exit('Something about 404...');
}

//Присоединение БД
$pdo = new PDO(
    'mysql:host=localhost;dbname=handbags;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);
include_once 'shop.php';
//include_once $action . '.html';
//echo "не получилось!!";


?>