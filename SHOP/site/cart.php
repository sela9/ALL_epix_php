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

//покупка товара в корзине
//запись в сессию


if ((isset($_POST["name"]))&&(isset($_POST["cont"]))) {
	     //var_dump($_POST);
         $_SESSION["order"]["name"]=$_POST["name"];
         $_SESSION["order"]["cont"]=$_POST["cont"];
         $_SESSION["order"]["summ"]=$_POST["summ"];
         //header ('Location: cart.php');
}

//var_dump($_SESSION['order']);

//редактирование количества товара в корзине

$actions = ['delete', 'add'];
$action = isset($_GET['action']) ? $_GET['action'] : NULL ;

if ((isset($action))&&(isset($_GET['id']))&&(isset($_SESSION["cart"]))) {
		if (!in_array($action, $actions)) {
		    exit('ERROR!!!!! Wrong link1!!!!!');
		} elseif (!array_key_exists($_GET['id'], $_SESSION["cart"])) {
			exit('ERROR!!!!! Wrong link!!!!! Перейти к списку <a href=cart.php>покупок</a>');
		} elseif ((isset($_SESSION["cart"]))&&($action=='add')&&(isset($_GET['id']))) {
			$_SESSION["cart"][$_GET['id']]++; 
			header ('Location: cart.php');
		} elseif ((isset($_SESSION["cart"]))&&($action=='delete')&&(isset($_GET['id']))) {
			$_SESSION["cart"][$_GET['id']]--;
			header ('Location: cart.php');
		} if (!$_SESSION["cart"][$_GET['id']]) {
			unset($_SESSION["cart"][$_GET['id']]);
			if (!($_SESSION["cart"])) {
				unset($_SESSION["cart"]);
			}
		} 

}



//Записываем ID в строку для запроса

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

     //получаем каталог из БД
		$st=$pdo->prepare($cart);
		//$st->bindParam(":id", $list);
		
		$st->execute();
		$stmt = $st->fetchAll(PDO::FETCH_ASSOC);
}		

if (isset($_SESSION['order'])) {
    try {
		//записываем в БД параметры сделанного заказа
		//запрос на вставку строки заказа (контакты и сумма заказа)
	  $pdo->beginTransaction();
		$order = "INSERT INTO orders (user_name, contacts, order_summ) VALUES (:uname, :ucon , :osumm)";
		$st_or = $pdo->prepare($order);
		$st_or->bindParam(':uname', $_SESSION["order"]["name"]);
		$st_or->bindParam(':ucon', $_SESSION["order"]["cont"]);
		$st_or->bindParam(':osumm', $_SESSION["order"]["summ"]);
		$st_or->execute();
		//получение ID добавленной записи
		$temp_id = $pdo->lastInsertId();
    
		//запрос на вставку данных по заказу (сумочки и количество)
		$ordrd_bags = "INSERT INTO prod_ordr (id_prdct, id_ordr, qtt) VALUES (:idpr, :idor, :qtt)";
		$st_bg = $pdo->prepare($ordrd_bags);
			foreach ($_SESSION["cart"] as $key => $value) {
				$st_bg->bindParam(':idpr', $key);
				$st_bg->bindParam(':idor', $temp_id);
				$st_bg->bindParam(':qtt', $value);
				$st_bg->execute();
		    }
	  $pdo->commit();
        echo "Заказ успешно добавлен, менеджер свяжется с вами<br>"; 
        unset($_SESSION['order']);
        unset($_SESSION["cart"]);
	}	    
	catch(PDOException $e)
    {
      $pdo->rollback();
        echo "При отправке заказа возникла ошибка. Попробуйте снова отправить заказ или позвоните нам.<br>";
        echo "Error: " . $e->getMessage();
    
    }	    
}

include_once 'cart.html';
include_once '../elements/footer.html';

?>