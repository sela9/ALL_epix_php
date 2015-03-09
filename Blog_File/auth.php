<?php

$auth = str_getcsv(file_get_contents('auth.txt'), "\n");

//var_dump($auth);

//Форма авторизации (выбор из списка)
echo '<br> Кто вы? <br>';
echo '<form action="auth.php" method="post">';
echo 'Новый пользователь? Просто укажите свое имя: <input type="text" name="new_name"/><br>';
foreach ($auth as $key => $value) {
	echo "<input type='radio' name='name' value='$value'/>$value<br />";
}
echo '<input type="submit" value="Авторизоваться"/>';
echo '</form>';

//запись куки по результатам выбора пользователя
if (isset($_POST["new_name"])&&($_POST["new_name"]!="")) {
	file_put_contents ( "auth.txt" , "\n".$_POST["new_name"] , FILE_APPEND);
	setcookie('name',$_POST["new_name"], time () + 3600);
} elseif (isset($_POST['name'])) {
	setcookie('name',$_POST["name"], time () + 3600);
} else var_dump($_POST);

//var_dump($_POST);