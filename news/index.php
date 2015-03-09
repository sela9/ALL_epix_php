<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Opportunity
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fresh NEWS!!!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<!-- шапка сайта (заголовок, получение количества элементов на странице)-->
<div class="wrapper col1">
  <div id="topbar">
  	 <form action="" method="get">
        <fieldset>
<?php 
if (isset($_GET['go'])) {
	$rows=$_GET['go'];
	echo '<input type="text" name="go" value="'.$rows.'"/>';
} else {echo '<input type="text" name="go" value="50"/>';
		$rows=50;
  }          
?>
          <input type="submit" id="go" value="Записей на странице" />
        </fieldset>
      </form>
  </div>
</div>
<div class="wrapper col2">
  <div id="header">
    <div id="logo">
      <h1><a href="index.php">The NEWS!</a></h1>
      <p>Свежайшие новости в интернете!</p>
    </div>
    <br class="clear" />
  </div>
</div>

<?php

//подключение к БД

$pdo = new PDO(
    'mysql:host=localhost;dbname=news;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);

//Постраничный переход

//Считаем количество строк в таблице
$qnt = $pdo->prepare('SELECT COUNT(*) FROM last_news');
$qnt->execute();
$qntt = $qnt->fetchAll();




// Создаем класс для пагинатора. Параметры - количество записей и количество на странице
Class Pag {
	public $pages; //количество записей на странице
	public $qntt;   //количество в БД всего
	public function __construct ($qntt, $pages) {
		$this->pages=$pages;
		$this->qntt=$qntt;
		$q=ceil($qntt/$pages); //вычисляем количество страниц
		for ($i=1; $i <= $q; $i++) {
	    	echo "<a href=index.php?go=".$pages."&numpage=".$i."> " .$i. " </a>";

	    }
	}
}
?>
<!--Показ списка новостей-->
<div class="wrapper col4">
  <div id="container">
    <div id="content">
 <?php 
$list = $pdo->prepare('SELECT * FROM last_news LIMIT :start, :lenth');
if (isset($_GET['numpage'])&&($_GET['numpage']<=$qntt['0']['COUNT(*)'] )) {$nump=$_GET['numpage'];}
else $nump='1';
//var_dump($nump, $rows);
if ($nump>1){$start = $rows*($nump-1)+1;} else $start = 1;
//var_dump($rows);
$list->bindParam(':start', intval($start), PDO::PARAM_INT);
$list->bindParam(':lenth', intval($rows), PDO::PARAM_INT);
$list->execute();

foreach ($list as $key => $value) {

 ?>      <ul>
          <li>
            <div class="latestnews">
              <h2><?php echo ($value['title']); ?></h2>
              <p><?php echo ($value['text']); ?></p>
            </div>
            <br class="clear" />
          </li>
         </ul>
<?php 
}
//показ номеров страниц
$test= new Pag ($qntt['0']['COUNT(*)'], $rows);

?>
    </div>
  </div>
</div>
<!-- Футер -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015   <a href="#">EPIC PHP</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>