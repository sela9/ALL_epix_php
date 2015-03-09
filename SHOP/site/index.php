<?php

//Топ 4 товара
//Распродажа
//Количество товаров в корзине

$actions = ['index', 'shop'];
//$action = isset($_GET['page']) ? $_GET['page'] : 'index';
//if (!in_array($action, $actions)) { 
//    exit('Something about 404...');
//}

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

include_once '../elements/header.html';
include_once 'index.html';
include_once '../elements/footer.html';
//echo "не получилось!!";


?>