<?php
session_start();
include_once "../elements/header.html";

//Подключение БД
$pdo = new PDO(
    'mysql:host=localhost;dbname=handbags;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);
//Записываем ID в строку
if(isset($_SESSION["cart"])){
		foreach ($_SESSION["cart"] as $key => $value) {
			if (isset($list)) {
			$list.=", ".$key;
		    } else $list=$key;
		}
		//запрос для формирования таблицы заказа (корзины)
		$cart = "SELECT products.name, products.price, products.price_sale, images.id, images.color, images.link 
		                    FROM products 
		  					INNER JOIN images ON products.id=images.id_product 
		    			    WHERE images.id IN (".$list.")";

		//var_dump($list);

		//получаем каталог из БД
		$st=$pdo->prepare($cart);
		//$st->bindParam(":id", $list);
		//var_dump($st);
		$st->execute();
		$stmt = $st->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($stmt);
}


?>

 

<?php

include_once 'cart.html';
include_once '../elements/footer.html';

?>

