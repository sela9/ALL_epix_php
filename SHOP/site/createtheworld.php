
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Администраторский портал!</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">

  </head>

  <body>

<?php
session_start();
//Подключение БД
$pdo = new PDO(
    'mysql:host=localhost;dbname=handbags;charset=utf8', 
    'root', 
    ''
);
$pdo->setAttribute(
    PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION
);

if ((isset($_SESSION['root']))&&($_SESSION['root']==='Повелитель')) {
	include_once "../elements/settings.html";
} else include_once "../elements/alogin.html";
?>







  </body>
</html>
