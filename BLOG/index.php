<?php

require_once 'header.php';

if (isset($_COOKIE["name"])) {
	require_once 'blog.php';
} else {echo '<br><a href=auth.php>Авторизоваться</a>';}

require_once 'footer.php';
