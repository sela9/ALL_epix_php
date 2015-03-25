<?php
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


include_once "../elements/alogin.html";
?>