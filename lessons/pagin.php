<?php

namespace EPICPHP;

Class Pag {
	public $pages;
	public function __construct ($pages) {
		$this->pages=$pages;
	}
	public function printpage($page) {
		for ($i=0; $i < $page; $i++) {
	    	echo "<a href=pagin.php&page=".$i.">" .$i. "</a></br>";
	    }

	} 


}



//$test= new Pag (5);
//$test->printpage(5);

