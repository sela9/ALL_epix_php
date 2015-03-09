<?php
namespace epic;

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

