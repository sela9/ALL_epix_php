<?php

if (!empty($_GET['id'])) {
   // var_dump($_POST);
    $del = "DELETE FROM products WHERE id = :id";
   // var_dump($insert);
    $stmt = $pdo->prepare($del);
    $stmt->bindParam (':id', $_GET['id']);
    $stmt->execute();
    header("Location: index.php");
}