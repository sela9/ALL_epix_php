<?php


$hello = 'Hello, you';

var_dump($hello);
print_r($hello);
echo '<br>';

$input = 'default';
if (isset ($_GET['name'])) {
	$input=$_GET['name']; }

echo $input;

echo '<br>';
//Тренировка команды GET
$input1 = 'default';
if (isset ($_GET['title'])) {
	$input1=$_GET['title']; }

$input2 = 'default';
if (isset ($_GET['description'])) {
	$input2=$_GET['description']; }

$input3 = 'default';
if (isset ($_GET['category'])) {
	$input3=$_GET['category']; }

$input4 = 'default';
if (isset ($_GET['price'])) {
	$input4=$_GET['price']; }

echo 'Название ' .$input1 . '<br>';
echo 'Описание ' .$input2 . '<br>';
echo 'Название категории ' .$input3 . '<br>';
echo 'Цена ' .$input4 . '<br>';

echo '<br>';

//подключение предыдущего занятия
//require_once 'test.php';
//require_once 'test.php';

//массив

$massiv = array ('first' => ['sunday', 'monday'] ,
	              'second' => 'tuesday') ;

var_dump ($massiv);

/*echo '<table>';
foreach($massiv as $key => $value) {
	echo '<tr><td>' . $key .'</td><td>' .$value .'</td></tr>';
}

echo '</table>';*/
echo '<br>';
echo $massiv ['first'][0];

$katalog = array (
    'Name' => [
           'тапки',
           'пижама',
           'штаны',
           'кофта',  
           'туфли',  
    			],
    'Type' => [
    	   'обувь',
           'одежда',
           'одежда',
           'одежда',  
           'обувь',  
    			],
    'Description' =>[
    	   'домашние тапочки',
           'удобная пижамочка',
           'удобные пижамные штаны',
           'тепленькая кофточка',  
           'летние туфельки',  
                    ],
    'cost' => [
           '498',
           '799',
           '599',
           '899', 
           '698',   ],
    'country' => [
           'KZ',
           'RU',
           'BL',
           'RU', 
           'ITL',   ]
	);
echo '<br>';
var_dump($katalog);
echo '<br>';
echo '<br>';

/*foreach ($katalog as &$product ) {
	$product['Name'] = $product['cost'];}*/
/*foreach ($katalog as &$key ) {
 shuffle ($key); }
 var_dump($katalog);*/
/* var_dump($katalog);
echo '<br>';
echo '<br>';*/

//$a = ['a','b','c'];
//$b = ['d','e','f'];

echo count ($katalog);
$a = (count($katalog) - count($katalog)%2)/2;
echo $a;
echo '<br>';
echo '<br>';
$katalog2=array_slice($katalog, 0, $a);
$katalog3=array_slice($katalog, $a+1, count($katalog));
var_dump($katalog2);
echo '<br>';
echo '<br>';
var_dump($katalog3);
echo '<br>';
echo '<br>';



