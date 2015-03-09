<?php

class Menu {
	public $title;
	public $orientation;
	public $items = [
         [
            'title'=>'О нас',
            'link'=>'?pade=about',

         ],
         [
            'title'=>'Продукция',
            'link'=>'?pade=products',

         ],
         [
            'title'=>'Контакты',
            'link'=>'?pade=contacts',

         ],
    ];
	public $backColor;
	public $font;
	public function __construct(){
		echo "construct!!!!";
	}
	public function render() {
	    foreach ($this->items as $key => $value) {
	    	echo "<a href=".$value['link'].">".$value['title']."</a>";
	    }
    }
}

$test = new Menu;
//var_dump($test);
$test->render();

Class TableMenu extends Menu {
	public function render() {
		echo '<table border=2><tr>';
	    foreach ($this->items as $key => $value) {
	    	echo "<td><a href=".$value['link'].">".$value['title']."</a></td>";
	    }
	    echo '</tr><table>';
    }


}

$newMenu = new TableMenu;
$newMenu->render();