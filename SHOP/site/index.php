<?php
session_start();

//$actions = ['index', 'shop'];
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
//Запрос сумок с самой низкой распродажной ценой
$home = "SELECT products.id, products.name, products.price, products.price_sale, images.color, images.link 
         FROM products 
    	 LEFT JOIN images ON products.id=images.id_product
    	 WHERE products.price_sale !='0' AND images.color !=''
         GROUP BY images.id_product
    	 ORDER BY products.price_sale
    	 LIMIT 4 ";
$st=$pdo->prepare($home);
$st->execute();
$stmt = $st->fetchAll(PDO::FETCH_ASSOC);

include_once '../elements/header.html';
include_once 'index.html';
include_once '../elements/footer.html';
//echo "не получилось!!";


?>