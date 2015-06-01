<?php 
//Создание новой сумочки (insert)

if (isset($_POST['bag'])) {
    $bag_create = "INSERT INTO products (name, description, price, price_sale, material)
                   VALUES (:name, :descr, :price, :sale, :fabric )";
             
    $st=$pdo->prepare($bag_create);
    $st->bindParam(':name', $_POST['name']);
    $st->bindParam(':descr', $_POST['description']);
    $st->bindParam(':price', $_POST['price']);
    $st->bindParam(':sale', $_POST['price_sale']);
    $st->bindParam(':fabric', $_POST['material']);
    $st->execute();
}

?>

    <h3>Добавить новую сумочку</h3>
    <form action="" method="post">
    Название:        <input type="text" name="name"        ><br>
    Описание:        <input type="text" name="description" ><br>
    Цена:            <input type="text" name="price"       ><br>
    Цена со скидкой: <input type="text" name="price_sale"  ><br>
    Материал:        <select name="material">
                      <option value="1" selected>Натуральная кожа</option>
                      <option value="2" >Искусственная кожа</option>
                      <option value="3" >Ткань</option>
                      </select><br>
    <input name='bag' type='submit' value='Создать'></form>