<?php 

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
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//Конец вставки сумочки

//Изменение инфы о сумочке (update)
if (isset($_POST["editbag"])) {
var_dump($_POST);  

$item_upd = "UPDATE products
           SET products.name=?, 
               products.description=?,
               products.price=?,
               products.price_sale=?,
               products.material=?,
         WHERE products.id = ?";

$st=$pdo->prepare($item_upd);
/*$st->bindParam(':name', $_POST['name']);
$st->bindParam(':decsr', $_POST['description']);
$st->bindParam(':price', $_POST['price']);
$st->bindParam(':sale', $_POST['price_sale']);
$st->bindParam(':fabric', $_POST['material']);
$st->bindParam(':id', $_POST['id_bag'], PDO::PARAM_INT);*/
//var_dump($st);
$st->execute(array($_POST['name'], $_POST['description'], $_POST['price'], $_POST['price_sale'], $_POST['material'], $_GET['id']));
var_dump($st);
}

//Изменение цвета сумочки (update)
//if(isset($_POST["bagcolor"])){}

//Удалеление строки с цветом и фоткой (delete)
//if(isset($_POST["deletebag"])){}

//Добавление новой строки с цветом и фоткой (insert)
//if(isset($_POST["newbag"])) {}





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
          <table border=1 summary="Список заказов">
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
    			      echo "<td><form action='createtheworld.php?action=editbag&id=".$value["id"]."' method='post'><input name='bagedit' type='submit' value='Изменить'>";
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
                INNER JOIN images ON products.id=images.id_product 
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
//        var_dump($stm);
    }
?>
    <h3>Изменить основную информацию о сумочке</h3>
    <form action="" method="post">
    Название:        <input type="text" name="name"        value="<?php echo $stm['0']['name']; ?>"><br>
    Описание:        <input type="text" name="description" value="<?php echo $stm['0']['description']; ?>"><br>
    Цена:            <input type="text" name="price"       value="<?php echo $stm['0']['price']; ?>"><br>
    Цена со скидкой: <input type="text" name="price_sale"  value="<?php echo $stm['0']['price_sale']; ?>"><br>
    Материал:        <select name="material">
                      <option value="1" <?php if (($stm['0']['id_fabric']) == '1') {echo 'selected';} ?> >Натуральная кожа</option>
                      <option value="2" <?php if (($stm['0']['id_fabric']) == '2') {echo 'selected';} ?> >Искусственная кожа</option>
                      <option value="3" <?php if (($stm['0']['id_fabric']) == '3') {echo 'selected';} ?> >Ткань</option>
                      </select><br>
    <input type='hidden' name='id_bag' value="<?php echo $_GET['id']; ?>" >
    <input name='editbag' type='submit' value='Изменить'></form>

    <h3>Изменить сведения о цвете</h3>


<?php
//Вывод всех фоток для сумочки с указанием цвета и возможностью изменения и удаления

    foreach ($stm as $key => $value) {
?>
         <form action="" method="post">
         <img src="../images/<?php echo $value["link"]; ?>" alt='' height='50px' width='40px'>
         Цвет: <input type="text" name="color" value="<?php echo $value['color']; ?>"><br>
         <input name='bagcolor' type='submit' value='Изменить'>
         <input type='hidden' name='id_item' value="<?php echo $value["id_item"]; ?>"></form>
         <form action="" method="post">
         <input type='hidden' name='id_item' value="<?php echo $value["id_item"]; ?>">
         <input name='deletebag' type='submit' value='Удалить'>
         </form>
         <br>
    

<?php     
}
?>  
<!-- Форма для добавления фотки и цвета для сумочки -->
         <form action="" method="post" enctype="multipart/form-data">
         Выбрать фото: <input type="file" name="fileToUpload" id="fileToUpload" required><br>
         Цвет: <input type="text" name="color">
         <input name='newbag' type='submit' value='Добавить'><br>
         </form>
<?php 
}

