<?php

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare(
        "SELECT * FROM products WHERE id = :id"
    );
    $stmt->execute([
        ':id' => $_GET['id']
    ]);
    if (!$row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "wrong id";
        exit;
    }
} else {
    echo "id is required";
    exit;
}
?>

<form method="post" action="">
    <div>Title<input type="text" name="title" value="<?=$row['title'];?>" /></div>
    <div>Description<input type="text" name="description" value="<?=$row['description'];?>" /></div>
    <div>Price<input type="text" name="price" value="<?=$row['price'];?>" /></div>
    <div>Type<input type="text" name="type" value="<?=$row['type'];?>"></textarea></div>
    <div><input type="submit" value="Переписать в БАЗЕ!!" /></div>
</form>

<?php
if (!empty($_POST)) {
     $edit = "UPDATE products SET price = ".$_POST['price']." WHERE id = ".$row['id']." ";
     $stmt = $pdo->exec($edit);
     echo '<meta http-equiv="refresh" content="0">';
}
