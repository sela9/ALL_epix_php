<form method="post" action="">
    <div>Title<input type="text" name="title" value="" /></div>
    <div>Description<input type="text" name="description" value="" /></div>
    <div>Price<input type="text" name="price" value="" /></div>
    <div>Type<textarea name="type"></textarea></div>
    <div><input type="submit" name="В БАЗУ!!" /></div>
</form>
<?php
if (!empty($_POST)) {
   // var_dump($_POST);
    $insert = "INSERT INTO products 
              (title, description, price, type)
              VALUES ('" . $_POST['title'] . "', 
                      '" . $_POST['description'] . "', 
                      '" . $_POST['price'] . "', 
                      '" . $_POST['type'] . "')
               ";
   // var_dump($insert);
    $stmt = $pdo->exec($insert);
}