<?php 

if(isset($_POST["newbag"])) {
// Вставка изображения сумочки 
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

if(isset($_POST['newbag'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $new_color = "INSERT INTO images (id_product, link, color)
                      VALUES (:id, :file, :color)";
        $stf=$pdo->prepare($new_color);
        $stf->bindParam(':id', $_GET['id']);
        $stf->bindParam(':file', basename( $_FILES["fileToUpload"]["name"]));
        $stf->bindParam(':color', $_POST['color']);
        $stf->execute();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//Конец вставки нового цвета и фото для сумочки
}

//Изменение инфы о сумочке (update)
if (isset($_POST["editbag"])) {
var_dump($_POST);  

$item_upd = "UPDATE products
           SET products.name=:name, 
               products.description=:descr,
               products.price=:price,
               products.price_sale=:sale,
               products.material=:fabric
         WHERE products.id = :id";
$st=$pdo->prepare($item_upd);
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':descr', $_POST['description']);
$st->bindParam(':price', $_POST['price']);
$st->bindParam(':sale', $_POST['price_sale']);
$st->bindParam(':fabric', $_POST['material']);
$st->bindParam(':id', $_POST['id_bag']);
//var_dump($st);
$st->execute();
}

//Изменение цвета сумочки (update)
if(isset($_POST["bagcolor"])){
        $change_color = "UPDATE images 
                         SET color=:color
                         WHERE id=:id ";
        $stf=$pdo->prepare($change_color);
        $stf->bindParam(':color', $_POST['color']);
        $stf->bindParam(':id', $_POST['id_item']);
        $stf->execute();


}

//Удалеление строки с цветом и фоткой (delete)
if(isset($_POST["deletebag"])){
    $del_color = "DELETE FROM images
                  WHERE id=:id";
    $std=$pdo->prepare($del_color);
    $std->bindParam(':id', $_POST['id_item']);
    $std->execute();
}


if (!(isset($_GET['id']))) {
//Показываем список сумочек для выбора

//получаем каталог из БД
    $listbag = "SELECT products.id, products.name, products.price, products.price_sale, images.id AS id_item, images.color, images.link, material.name_full 
    		    FROM products 
    		    INNER JOIN images ON products.id=images.id_product 
        	    INNER JOIN material ON products.material=material.id
        	    ORDER BY id";

    $st=$pdo->prepare($listbag);
    $st->execute();
    $stmt = $st->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($stmt);

    ?>

     <h1>Полный список сумочек</h1>
          <table class="table table-striped" summary="Список заказов">
            <thead>
              <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Sale цена</th>
                <th>Цена</th>
                <th>Цвет</th>
                <th>Материал</th>
                <th>__</th>
              </tr>
            </thead>
            <tbody>
    <?php

    $equal=array(); //чтобы не выводить повторы
    foreach ($stmt as $key => $value) {
              if (in_array($value['id'], $equal)) { 
    			continue;
    		  } else {
              	      $equal[]=$value["id"];
                      echo "<tr><td><img src='../images/".$value["link"]."' alt='' height='50px' width='40px'>";
    			      echo "</td><td>".$value["name"]."</td>";
    			      echo "<td>".$value["price_sale"]."</td>";
    			      echo "<td>".$value["price"]."</td>";
    			      echo "<td>".$value["color"]."</td>";
    			      echo "<td>".$value["name_full"]."</td>";
    			      echo "<td><form action='createtheworld.php?action=editbag&id=".$value["id"]."' method='post'><input name='bagedit' type='submit' class='btn btn-default' value='Изменить'>";
    			      echo "<input type='hidden' name='id_item' value=".$value["id_item"]."></form></td></tr>";
    	        }
    }

?>

		</tbody>
	  </table>


<?php 

} else {

    $bagedit = "SELECT products.id, products.name, products.description, products.price, products.price_sale, images.id AS id_item, images.color, images.link, material.name_full, material.id AS id_fabric
                FROM products 
                LEFT JOIN images ON products.id=images.id_product 
                INNER JOIN material ON products.material=material.id 
                WHERE products.id = :id ";

        //var_dump($list);

        //получаем карточку товара из БД
    $stt=$pdo->prepare($bagedit);
    if ((is_numeric($_GET['id']))&&($_GET['id'])) { 
        $stt->bindParam(":id", $_GET['id']);
    //    var_dump($stt);
        $stt->execute();
        $stm = $stt->fetchAll(PDO::FETCH_ASSOC);
 //       var_dump($stm);
    }
?>
<!-- Форма вывода информации о сумочке и всех цветах для редактирования и добавления цветов-->
    <h3>Изменить основную информацию о сумочке</h3>
    <form action="" class="form-horizontal" method="post">
        <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Название:</label>
             <div class="col-sm-10">
                 <input type="text" name="name" class="form-control" value="<?php echo $stm['0']['name']; ?>">
             </div>
        </div>
        <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Описание:</label>
             <div class="col-sm-10">
                 <input type="text" name="description" value="<?php echo $stm['0']['description']; ?>" class="form-control">
             </div>
        </div>
        <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Цена:</label>
             <div class="col-sm-10">
                 <input type="text" name="price" value="<?php echo $stm['0']['price']; ?>" class="form-control">
             </div>
        </div>
        <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Цена со скидкой:</label>
             <div class="col-sm-10">
                 <input type="text" name="price_sale"  value="<?php echo $stm['0']['price_sale']; ?>" class="form-control">
             </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Материал:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="material">
                      <option value="1" <?php if (($stm['0']['id_fabric']) == '1') {echo 'selected';} ?> >Натуральная кожа</option>
                      <option value="2" <?php if (($stm['0']['id_fabric']) == '2') {echo 'selected';} ?> >Искусственная кожа</option>
                      <option value="3" <?php if (($stm['0']['id_fabric']) == '3') {echo 'selected';} ?> >Ткань</option>
                    </select>
                </div>
        </div>
        <input type='hidden' name='id_bag' value="<?php echo $_GET['id']; ?>" >
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input name='editbag' class="btn btn-default" type='submit' value='Изменить'>
            </div>
        </div>
    </form>

    <h3>Изменить сведения о цвете</h3>
        <div class="row">

<?php
//Вывод всех фоток для сумочки с указанием цвета и возможностью изменения и удаления

    foreach ($stm as $key => $value) {
?>          
            <div class="col-sm-6 col-md-3">
              <div class="thumbnail">
                 <img src="../images/<?php echo $value["link"]; ?>" alt='' height='150px' width='120px'>
                 <div class="caption">
                  <div class="row">
                     <form action="" method="post">
                             <label style="padding-left:10%">Цвет</label>
                             <input type="text" name="color" value="<?php echo $value['color']; ?>">
                             <input name='bagcolor' class="col-sm-6 btn btn-default" type='submit' value='Изменить'>
                             <input type='hidden' name='id_item' value="<?php echo $value["id_item"]; ?>">
                     </form>
                     <form action="" method="post">
                             <input type='hidden' name='id_item' value="<?php echo $value["id_item"]; ?>">
                             <input name='deletebag' class="col-sm-6 btn btn-default" type='submit' value='Удалить'>
                     </form>
                  </div>
                 </div>
              </div>
            </div>
<?php     
}
?>
</div>

<!-- Форма для добавления фотки и цвета для сумочки -->
<h3>Добавить новый цвет с фото</h3>
         <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Выбрать фото:</label>
                  <div class="col-sm-10">
                      <input type="file" class="btn btn-default" name="fileToUpload" id="fileToUpload" required>
                  </div>
            </div>
            <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Цвет:</label>
                  <div class="col-sm-3">
                      <input type="text" name="color" class="form-control">
                  </div>
            </div>   
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <input name='newbag' class="btn btn-default" type='submit' value='Добавить'>
                </div>
            </div> 
         </form>
<?php 
}

