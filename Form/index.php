<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Каталог товаров с БД</title>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body>
<div class="wrapper col2">
  <div id="header">
    <div id="logo">
      <h1><a href="index.html">Каталог</a></h1>
      <p>Товары для девушек в тренде</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="index.php?action=insert">Добавить запись</a></li>
        <li><a href="index.php">На главную страницу</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>




<?php
$actions = ['insert', 'list', 'delete', 'edit'];
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
if (!in_array($action, $actions)) {
    exit('Запрещенная ссылочка');
}
$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);
include $action . '.php';
?>
</body>
</html>