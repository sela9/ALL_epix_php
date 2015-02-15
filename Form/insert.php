<div class="wrapper col4">
  <div id="container">
    <div id="content">
    <h2>Добавить запись в каталог</h2>
      <div id="respond">
        <form action="" method="post">
          <p>
            <label for="title"><small>Title</small></label>
            <input type="text" name="title" value="" size="22" />
          </p>
          <p>
            <label for="description"><small>Description</small></label>
            <input name="description" cols="100%" rows="2"></textarea>
          </p>
          <p>
            <label for="type"><small>Type</small></label>
            <input type="text" name="type" value="" size="22" />
          </p>
          <p>
            <label for="price"><small>Price</small></label>
            <input type="text" name="price" value="" size="22" />
          </p>
          <p>
            <input name="submit" type="submit" value="В БАЗУ!!!"/>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

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