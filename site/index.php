<?php

require_once 'header.php';

if (isset($_GET['page'])&&$_GET['page']==='content'){ $page=$_GET['page'];}
else $page='main';

require_once ($page).'.php'; //Присоединение каталога или главной страницы

require_once 'footer.php';