<?php

require_once 'header.php';

var_dump($_COOKIE);

if (isset($_COOKIE['user'])) {
	require_once 'blog.php';
} else {require_once 'auth.php';}

require_once 'footer.php';
