<?php
$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8','root','');
$statement = $pdo ->query("SELECT * FROM products");
$row=$statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['title']);
var_dump($row);
