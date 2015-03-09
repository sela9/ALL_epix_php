<?php


	$news=simplexml_load_file('C:\xampp\htdocs\EPICPHP\news\news.xml');
//	var_dump($news);

$fp= fopen('news.csv', 'a+');
	foreach ($news->channel->item as $key => $value) {
//	 	var_dump ($value->title);
	 	echo '<br>TITLE '.$value->title;
	    echo '<br>LINK '.$value->link;
	    echo '<br>TEXT '.$value->description;
	    echo '<br>DATE '.$value->pubDate;
	    echo '<br>';
	    $news = array("title"=>"$value->title", "link"=>"$value->link", "description"=>"$value->description", "pubDate"=>"$value->pubDate");
	    fputcsv($fp, $news);

	}
fclose($fp);