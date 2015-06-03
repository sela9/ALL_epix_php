<?php
session_start();
include_once "../elements/header.html";
echo '<div class="row row-offcanvas row-offcanvas-right">';
include_once "../elements/filter.html";

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


//функция формирования запроса по данным из фильтра
function addWhere($where, $add, $and = true) {
    if ($where) {
      if ($and) $where .= " AND $add";
      else $where .= " OR $add";
    }
    else $where = $add;
    return $where;
  }

//Составляем запрос на основании данных из фильтра

  if (!empty($_SESSION["filter"])) {
    $where = "";
    if ($_SESSION["filter"]["price_start"]) $where = addWhere($where, "products.price >=".htmlspecialchars($_SESSION["filter"]["price_start"]));
    if ($_SESSION["filter"]["price_end"]) $where = addWhere($where, "products.price <=".htmlspecialchars($_SESSION["filter"]["price_end"]));
    if (isset($_SESSION["filter"]["colors"])) $where = addWhere($where, "images.color IN ('".htmlspecialchars(implode("', '", $_SESSION["filter"]["colors"]))."')");
    if (isset($_SESSION["filter"]["material"])) $where = addWhere($where, "material.material_name IN ('".htmlspecialchars(implode("', '", $_SESSION["filter"]["material"]))."')");
    if (isset($_SESSION["filter"]["sale"])) $where = addWhere($where, "products.price_sale !='0'");
    $filter = "SELECT products.id, products.name, products.price, products.price_sale, images.id AS id_item, images.color, images.link FROM products 
    			INNER JOIN images ON products.id=images.id_product
    			INNER JOIN material ON products.material=material.id";
    if ($where) $filter .= " WHERE $where";
    
  } else $filter = "SELECT products.id, products.name, products.price, products.price_sale, images.id AS id_item, images.color, images.link FROM products 
  					INNER JOIN images ON products.id=images.id_product 
    			    INNER JOIN material ON products.material=material.id";
// var_dump($filter);


//получаем каталог из БД
$st=$pdo->prepare($filter);
$st->execute();
$stmt = $st->fetchAll(PDO::FETCH_ASSOC);
// var_dump($stmt);


include_once 'shop.html';
echo '</div>';
include_once '../elements/footer.html';



?>