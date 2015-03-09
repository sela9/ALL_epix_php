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
<title>The BEST BLOG ever!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">

<!-- Проверка, авторизован ли пользователь-->  
<?php
$actions = ['auth', 'writers'];
$action = isset($_COOKIES['user']) ? 'writers' : 'auth';
if (!in_array($action, $actions)) { 
    exit('Зря, сударь, вы сюда зашли...');
}

//Присоединение БД
$pdo = new PDO(
    'mysql:host=localhost;dbname=blogg;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);

include $action . '.php';
echo "не получилось!!";


?>

<!-- Шапка сайта -->
<div class="wrapper col2">
  <div id="header">
    <div id="logo">
      <h1><a href="index.php">The БЛОГ</a></h1>
      <p>Лучший из лучших блог!</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="index.php">Наши авторы</a>
        </li>
        <li><a href="index.php">На главную страницу</a>
        </li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- Список 10 последних постов блога с листалкой-->
<div class="wrapper col4">
  <div id="container">
    <div id="content">      
      <div id="comments">
        <h2>Записи БЛОГА</h2>
        <ul class="commentlist">

<?php
$stmt = $pdo->prepare("SELECT * FROM posts INNER JOIN users ON posts.id_user=users.id_user;");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
//var_dump($rows)

foreach ($rows as $key => $value) {
  if ($key%2) {
    echo '<li class="comment_odd">';
  } else echo '<li class="comment_even">';
  echo '<div class="author"><img class="avatar" src="'.$value['avatar'].'" width="32" height="32" alt="" />
        <span class="name"><a href="#">'.$value['name'].'</a></span> <span class="wrote">пишет:</span></div>';
  echo '<div class="submitdate"><a href="#">'.$value['post_time'].'</a></div>';
  echo '<p>'.$value['text'].'</p>';
}

?>
        </ul>
      </div>
<!-- Добавить новую запись (для авторов) -->
       <h2>Добавить запись</h2>
      <div id="respond">
        <form action="#" method="post">
          <p>
            <input type="text" name="name" id="name" value="" size="22" />
            <label for="name"><small>Name (required)</small></label>
          </p>
          <p>
            <input type="text" name="email" id="email" value="" size="22" />
            <label for="email"><small>Mail (required)</small></label>
          </p>
          <p>
            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
          </p>
          <p>
            <input name="submit" type="submit" id="submit" value="Submit Form" />
            &nbsp;
            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
          </p>
        </form>
      </div>
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