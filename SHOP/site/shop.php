<!-- Вывод фильтра -->
<form name="form" action="" method="post">
  <table>
    <tr>
      <td>Цена от:</td>
      <td><input type="text" name="price_start" /> рублей</td>
    </tr>
    <tr>
      <td>Цена до:</td>
      <td><input type="text" name="price_end" /> рублей</td>
    </tr>
    <tr>
      <td colspan="2"><h4>Цвет</h4></td>
    </tr>
    <tr>
      <td>Черный</td>
      <td>
        <input type="checkbox" name="colors[]" value="black" />
      </td>
    </tr>
    <tr>
      <td>Коричневый</td>
      <td>
        <input type="checkbox" name="colors[]" value="brown" />
      </td>
    </tr>
    <tr>
      <td>Белый</td>
      <td>
        <input type="checkbox" name="colors[]" value="white" />
      </td>
    </tr>
   <tr>
      <td colspan="2"><h4>Материал</h4></td>
    </tr>
    <tr>
      <td>Кожа</td>
      <td>
        <input type="checkbox" name="material[]" value="leather" />
      </td>
    </tr>
    <tr>
      <td>Искуственная кожа</td>
      <td>
        <input type="checkbox" name="material[]" value="not_leather" />
      </td>
    </tr>
    <tr>
      <td>Ткань</td>
      <td>
        <input type="checkbox" name="material[]" value="cloth" />
      </td>
    </tr>
    <tr>
      <td>Со скидкой</td>
      <td>
        <input type="checkbox" name="sale"/>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="filter" value="Подобрать сумочки" />
      </td>
    </tr>
  </table>
</form>



<?php

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

  if (!empty($_POST["filter"])) {
    $where = "";
    if ($_POST["price_start"]) $where = addWhere($where, "price >=".htmlspecialchars($_POST["price_start"]));
    if ($_POST["price_end"]) $where = addWhere($where, "price <=".htmlspecialchars($_POST["price_end"]));
    if ($_POST["colors"]) $where = addWhere($where, "colors IN (".htmlspecialchars(implode(",", $_POST["colors"])).")");
    if ($_POST["material"]) $where = addWhere($where, "material IN (".htmlspecialchars(implode(",", $_POST["material"])).")");
    if ($_POST["sale"]) $where = addWhere($where, "sale = '1'");
    $filter = "SELECT * FROM products ";
    if ($where) $filter .= "WHERE $where";
    
  } else $filter = "SELECT * FROM products ";
 var_dump($filter);

//получаем каталог из БД
$st=$pdo->prepare($filter);
$st->execute();
$stmt = $st->fetchAll(PDO::FETCH_ASSOC);
 var_dump($stmt);







?>