<?php

session_start();

/*if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
echo $_SESSION['count'];*/

//массив каталог товаров
$pricat = [
    ['name'=> 'Клатч',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '2 000',
     'country'=> 'Италия',
    ],
    ['name'=> 'Сумка через плечо',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '998',
     'country'=> 'Россия',
    ],    
    ['name'=> 'Сумка на пояс',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '1 000',
     'country'=> 'Китай',
    ],    
    ['name'=> 'Рюкзак',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '2 399',
     'country'=> 'Южная Корея',
    ],    
    ['name'=> 'Театральная сумочка',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '1098',
     'country'=> 'Франция',
    ],    
    ['name'=> 'Сумка повседневная',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '6 099',
     'country'=> 'Германия',
    ],    
    ['name'=> 'Чемодан',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '3 298',
     'country'=> 'Россия',
    ],    
    ['name'=> 'Сумка пляжная',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '698',
     'country'=> 'Беларусь',
    ],    
    ['name'=> 'Сумочка - конверт',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '1 998',
     'country'=> 'Китай',
    ],    
    ['name'=> 'Сумка спортивная',
     'category'=> 'Сумка',
     'description'=> '',
     'price'=> '1 498',
     'country'=> 'Америка',
    ], 
];

foreach ($pricat as $product => $key) {
echo '<ul>';
	echo '<li>';
	echo ($pricat[$product]['name']);
	echo '<a href="?id='. $product .' ">В корзину</a>';
	echo '</li>';
echo '</ul>';
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (is_numeric($id)&&$id<count($pricat)) {
	$_SESSION['pricat'][$id]=$pricat[$id];
}

//var_dump ($_SESSION);

echo "<h2>Корзина<h2>";
foreach ($_SESSION as $product => $key) {
    foreach ($key as $k => $v) {
        echo '<ul>';
        	echo '<li>';
            echo ($v["name"]);
        	echo '<a href="?id_del='. $k .' ">Удалить из корзины</a>';
        	echo '</li>';
        echo '</ul>';
    }
}

$id_del = isset($_GET['id_del']) ? $_GET['id_del'] : null;
if (is_numeric($id_del)&&$id_del<count($pricat)) {
    unset($_SESSION['pricat'][$id_del]);
}