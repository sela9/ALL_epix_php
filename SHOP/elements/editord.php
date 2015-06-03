<?php

//Запрос детальных сведений о заказе (статус, сумма, количество товаров)

if (isset($_GET['id'])) {
	try {
		$order = "SELECT orders.status, orders.user_name, orders.order_summ, orders.contacts, images.id, images.link, prod_ordr.qtt
	              FROM orders 
	              INNER JOIN prod_ordr ON prod_ordr.id_ordr=orders.id
	              INNER JOIN images ON prod_ordr.id_prdct=images.id
	              WHERE orders.id = :id";

		$st_or = $pdo->prepare($order);
		$st_or->bindParam(':id', $_GET['id']);
	    $st_or->execute();
	    $orders = $st_or->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }   

$status = array ('Заказан', 'Подтвержден', 'Оплачен', 'Завершен', 'Отменен');


if (isset($_POST['update'])) {
    try {
		//записываем в БД изменения для заказа
	  $pdo->beginTransaction();
		$order = "UPDATE orders 
		          SET status=:stat , order_summ=:osumm
		          WHERE id=:id";
		$st_or = $pdo->prepare($order);
		$st_or->bindParam(':stat', $_POST["status"]);
		$st_or->bindParam(':osumm', $_POST["order_summ"]);
		$st_or->bindParam(':id', $_GET['id']);
		$st_or->execute();
		unset ($_POST['status']);
		unset ($_POST['order_summ']);

    
		//записываем новое количество сумочек в заказе
		$ordrd_bags = "UPDATE prod_ordr 
		               SET qtt=:qtt
		               WHERE id_prdct=:idp AND id_ordr=:ido";
		$st_bg = $pdo->prepare($ordrd_bags);
			foreach ($_POST as $key => $value) {
				$st_bg->bindParam(':idp', $key);
				$st_bg->bindParam(':ido', $_GET['id']);
				$st_bg->bindParam(':qtt', $value);
				$st_bg->execute();
		    }
	  $pdo->commit();
        echo "Заказ успешно изменен<br>"; 
        unset($_POST); 
        //header ('Location: createtheworld.php');      
	}	    
	catch(PDOException $e)
    {
      $pdo->rollback();
        echo "При изменении заказа возникла ошибка.<br>";
        echo "Error: " . $e->getMessage();
    
    }	    
}


?>
 

<!-- Показываем форму редактирования заказов -->

 
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
    		<label class="col-sm-2 control-label">Клиент</label>
    		<div class="col-sm-10">
     			<p class="form-control-static"><?php echo $orders['0']['user_name']?></p>
    		</div>
        </div>
        <div class="form-group">
    		<label class="col-sm-2 control-label">Контакт</label>
    		<div class="col-sm-10">
     			<p class="form-control-static"><?php echo $orders['0']['contacts']?></p>
    		</div>
        </div>
        <div class="form-group">
    		<label class="col-sm-2 control-label">Статус заказа</label>
    		<div class="col-sm-10">
	    		<select class="form-control" name="status">
					<?php foreach ($status as $key => $value) {
							if ($value==$orders['0']['status']) {
								echo "<option value=".$value." selected>".$value."</options>";
							} else echo "<option value=".$value.">".$value."</options>";
						  } 
					?>
	       		</select>
       		</div>
        </div>
        <div class="form-group">
			<label class="col-sm-2 control-label">Сумма</label>
 			<div class="col-sm-10">
      			<input type="text" name="order_summ" value="<?php echo $orders['0']['order_summ']; ?>" class="form-control">
    		</div>
        </div>

    		<?php foreach ($orders as $key => $value) { ?>
        <div class="form-group">
	            <label class="col-sm-2 control-label">Количество</label>
	    		<div class="col-sm-1">
	    			<img src='../images/<?php echo $value["link"]?>' alt='' height='50px' width='40px'>
	    		</div>
	 			<div class="col-sm-9">
	      			<input type="text" name="<?php echo $value["id"]; ?>" value="<?php echo $value['qtt']; ?>" class="form-control">
	    		</div>
        </div>
    		<?php } ?>



<!--      
<?php foreach ($orders as $key => $value) { ?>
	  Сумочка:
      <img src='../images/<?php echo $value["link"]?>' alt='' height='50px' width='40px'>
      Количество:
      <input type="text" name="<?php echo $value["id"]; ?>" value="<?php echo $value['qtt']; ?>">
      <br>

<?php } ?>

-->
      <div class="form-group text-right">
          <div class="col-sm-2">
            <input class="btn btn-default" type="submit" name="update" value="Изменить">
          </div>
      </div>
    </form>

<?php
} else echo "Не выбран заказ";
?>
