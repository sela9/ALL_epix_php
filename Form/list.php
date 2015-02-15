<?php
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="wrapper col4">
  <div id="container">
    <div id="content">
      <h1>Полный список товаров</h1>
      <table summary="Список товаров, который выводится аж из базы данных" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Названьице</th>
            <th>Описаньице</th>
            <th>Почём?</th>
            <th>Категория товара</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($rows as $key => $row) {
	if ($key%2) {
		echo "<tr class='light'>";
	} else echo "<tr class='dark'>";
	echo "<td>".$row['title']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td><a href='index.php?action=delete&id=".$row['id']."' style = 'background-color:none'>Удалить</a></td>";
	echo "<td><a href='index.php?action=edit&id=".$row['id']."'>Изменить</a></td>";
	echo "</tr>";
}
?>

        </tbody>
      </table>
    </div>
    <br class="clear" />
  </div>
</div>
