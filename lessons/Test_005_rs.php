<?php 
//require_once 'pagin.php';




//$pa = new Epicphp\Pag(5);
//$pa->printpage();

//var_dump($pa);

function __autoload($class_name)
{
 //   $class_name = str_replace("\\", "/", $class_name);
    require_once "{$class_name}.php";
}
//use Epic;
$menu = new epic\Menu ();
var_dump($menu);