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

<div class="wrapper col4">
  <div id="container">
    <div id="content">
    <h2>Изменить запись в каталоге</h2>
      <div id="respond">
        <form action="" method="post">
          <p>
            <label for="title"><small>Title</small></label>
            <input type="text" name="title" value="<?=$row['title'];?>" size="22" />
          </p>
          <p>
            <label for="description"><small>Description</small></label>
            <input name="description" value="<?=$row['description'];?>" cols="100%" rows="2"></textarea>
          </p>
          <p>
            <label for="type"><small>Type</small></label>
            <input type="text" name="type" value="<?=$row['type'];?>" size="22" />
          </p>
          <p>
            <label for="price"><small>Price</small></label>
            <input type="text" name="price" value="<?=$row['price'];?>" size="22" />
          </p>
          <p>
            <input name="submit" type="submit" value="Изменить в БАЗЕ!!!"/>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if (!empty($_POST)) {
     $edit = "UPDATE products SET 
                        title = '".$_POST['title']."',
                        price = '".$_POST['price']."',
                        description = '".$_POST['description']."',
                        type = '".$_POST['type']."'                        
                    WHERE id = ".$row['id']."; ";
     $stmt = $pdo->exec($edit);
     echo '<meta http-equiv="refresh" content="0">';
}
