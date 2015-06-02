<?php
 try {
    //Запрос списка заказов
    $order = "SELECT * FROM orders ORDER BY id DESC LIMIT 200";
    $st_or = $pdo->prepare($order);
    $st_or->execute();
    $orders = $st_or->fetchAll(PDO::FETCH_ASSOC);

}     
  catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }     

?>
 <h2 class="sub-header">Полный список заказов</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Статус заказа</th>
                  <th>Сумма, руб.</th>
                  <th>Имя</th>
                  <th>Как связаться?</th>
                </tr>
              </thead>
              <tbody>
<?php 
foreach ($orders as $key => $row) {
	echo "<td><a href='createtheworld.php?action=editord&id=".$row['id']."'>".$row['status']."</a></td>";
	echo "<td><a href='createtheworld.php?action=editord&id=".$row['id']."'>".$row['order_summ']."</a></td>";
	echo "<td>".$row['user_name']."</td>";
	echo "<td>".$row['contacts']."</td>";
	echo "</tr>";
}
?>

        </tbody>
      </table>
    </div>
  </div>