<?php

$auth = str_getcsv(file_get_contents('auth.txt'), "\n");

var_dump($auth);

echo '<br> Кто вы? <br>';
echo '<form action="index.php" method="post">';
echo 'Новый пользователь? Просто укажите свое имя: <input type="text" name="new_name"/><br>';
foreach ($auth as $key => $value) {
	echo "<input type='radio' name='name' value='$value'/>$value<br />";
}
echo '<input type="submit" value="Авторизоваться"/>';
echo '</form>';
if (isset($_POST["new_name"])) {
	file_put_contents ( "auth.txt" , $_POST["new_name"] , FILE_APPEND);
	$_COOKIE = "\n".$_POST["new_name"];
} elseif (isset($_POST["name"])) {
	$_COOKIE = $_POST["name"];
  } else var_dump($_POST);