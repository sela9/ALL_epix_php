<?php
session_start();
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

if ((isset($_SESSION['root']))&&($_SESSION['root']==='Повелитель')) {
	include_once "../elements/settings.html";
} else include_once "../elements/alogin.html";
?>