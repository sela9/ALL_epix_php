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
$bag = isset($_GET['bag']) ? $_GET['bag'] : '0';
//запрос для просмотра карточки товара

$item = "SELECT products.id, products.name, products.description, products.price, products.price_sale, images.id AS id_item, images.color, images.link, material.name_full 
		 FROM products 
		 INNER JOIN images ON products.id=images.id_product 
    	 INNER JOIN material ON products.material=material.id 
		 WHERE products.id = :id ";

		//var_dump($list);

		//получаем карточку товара из БД
		$st=$pdo->prepare($item);
if ((is_numeric($bag))&&($bag))	{	
		$st->bindParam(":id", $bag);
//		var_dump($st);
		$st->execute();
		$stmt = $st->fetchAll(PDO::FETCH_ASSOC);
//		var_dump($stmt);
}





include_once 'handbag.html';
include_once '../elements/footer.html';
?>