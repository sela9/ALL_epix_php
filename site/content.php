<?php
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

//var_dump($pricat);

$q=(count($pricat)); //количество товаров в каталоге

if (isset($_GET['list'])&&($_GET['list']< $q/2)) { $list=$_GET['list'];}
else $list='0';
echo '<br>';

function print_items($pricat, $list){ // функция печати для одного товара
echo '<table border=2>';
    { 
        echo '<tr>';
        echo '<td rowspan=4><img src="img_'.$list.'.jpg" alt="Изображение сумочки"> </td>';
        echo '<td> Наименование </td>';
        echo '<td>' . $pricat[$list]['name'] . '</td></tr>';
        echo '<tr><td> Категория товара </td>';
        echo '<td>' . $pricat[$list]['category'] . '</td></tr>';
        echo '<tr><td> Описание товара </td>';
        echo '<td>' . $pricat[$list]['description'] . '</td></tr>';
        echo '<tr><td> Стоимость </td>';
        echo '<td>' . $pricat[$list]['price'] . '</td></tr>';
        echo '<tr><td>Укажите количество: <form action = "index.php?page=content&list='.$list.' " method = "post"><p><input name='.$pricat[$list].'></p>';
        echo '<p><input type="submit"></p>';
        echo '</form></td><td> Страна - Производитель </td>';
        echo '<td>' . $pricat[$list]['country'] . '</td></tr>';
        echo '</tr>';
    }
echo '</table>';             }



print_items ($pricat, $list*2);
print_items ($pricat, $list*2+1);


for ($i=0; $i < ($q/2) ; $i++) { 
	echo '<A HREF="index.php?page=content&list='.$i.'">  '.($i+1).'  </A>';
}
var_dump($_POST);
echo '<br>';
echo '<A HREF="index.php">Вернуться на главную</A>';
