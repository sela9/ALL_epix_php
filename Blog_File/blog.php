<?php

$pdo = new PDO('mysql:host=localhost;dbname=BLOGG;charset=utf8','root','');
$statement = $pdo ->query("SELECT * FROM posts");
$row=$statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['0']);
var_dump($row);