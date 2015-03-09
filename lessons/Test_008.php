1<?php

$text = file_get_contents('http://lenta.ru');
//preg_match_all('/img.*?src="(.*?)"/im', $text, $matches);
preg_match_all('/<h.>.*?h.>/im', $text, $matches);
var_dump($matches);

$data = array(
 array('id' => 1, 'name' => 'Bob', 'position' => 'Clerk'),
 array('id' => 2, 'name' => 'Alan', 'position' => 'Manager'),
); 

$rez_data = array_map(
     function($data) {
     	return array ('name'=>$data['name']);
     },$data

	);
var_dump($rez_data);

$data = array(
 array('date' => 'tomorrow', 'title' => 'World'),
 array('date' => '+1 month', 'title' => 'Hello'),
 array('date' => 'today', 'title' => 'Hello'),
 array('date' => '1 week ago', 'title' => 'Hello'),
); 

uasort($data, 
	function($a, $b){
		$date1=strtotime($a['date']);
		$date2=strtotime($b['date']);
        if ($date1 == $date2) {
        return 0;
    }
    return ($date1 < $date2) ? -1 : 1;
	});
var_dump($data);


