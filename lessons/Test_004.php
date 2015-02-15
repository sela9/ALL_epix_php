<html>
<head>
	<title>Заполняем БД</title>
	<meta charset="utf-8" />
</head>
<body>




<?php


echo '<br>';
echo '<form action method="post">';
echo 'Title: <input type="text" name="title"/><br>';
echo 'Description: <input type="text" name="description"/><br>';
echo 'Price: <input type="text" name="price"/><br>';
echo 'Type: <input type="text" name="type"/><br>';
echo '<input type="submit" value="В БАЗУ!!"/>';
echo '</form>';

//var_dump($_POST['title']);


$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8','root','');
$pdo->setAttribute(
	PDO::ATTR_ERRMODE,
	PDO::ERRMODE_EXCEPTION
);
if (!empty($_POST)){
$statement = $pdo->exec("INSERT INTO products (title, description, price, type) VALUES ('" . $_POST['title'] ."','".$_POST['description']."','".$_POST['price']."','".$_POST['type']."')");
//$row=$statement->fetch(PDO::FETCH_ASSOC);
//echo htmlentities($row['0']);
//var_dump($pdo);
}

/*$stmt=$pdo->prepare('SELECT * FROM products WHERE id=:id');
for ($i=0; $i < 5; $i++) { 
	$stmt->execute(array('id'=> $i));
	var_dump($stmt);
}*/

/*$action = isset($_GET['action']) ? $_GET['action'] : list;
if (!in_array($action, $actions)) {
	exit('bye');
}*/

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table border=1><tr><td>Названьице</td><td>Описаньице</td><td>Почём?</td><td>Категория товара</td></tr>';
foreach ($rows as $key => $row) {
	echo "<tr>";
	echo "<td>".$row['title']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "</tr>";
}
echo '</table>';



?>
</body></html>