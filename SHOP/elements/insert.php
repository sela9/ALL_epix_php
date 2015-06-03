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
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Название:</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Описание:</label>
                <div class="col-sm-10">
                  <input type="text" name="description" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Цена:</label>
                <div class="col-sm-10">
                  <input type="text" name="price" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Цена со скидкой:</label>
                <div class="col-sm-10">
                  <input type="text" name="price_sale" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Материал</label>
                <div class="col-sm-10">
                    <select class="form-control" name="material">
                          <option value="1" selected>Натуральная кожа</option>
                          <option value="2" >Искусственная кожа</option>
                          <option value="3" >Ткань</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input name='bag' type='submit' class="btn btn-default" value='Создать'>
                </div>
            </div>
        </form>

   