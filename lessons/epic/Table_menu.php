<?php
namespace epic;

Class Table_Menu extends Menu {
	public function render() {
		echo '<table border=2><tr>';
	    foreach ($this->items as $key => $value) {
	    	echo "<td><a href=".$value['link'].">".$value['title']."</a></td>";
	    }
	    echo '</tr><table>';
    }


}
