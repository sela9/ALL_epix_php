<form method="post">
<input type="submit" name="news" value="Даешь новость!!!" />
</form>
<?php

if (isset($_POST['news'])) {
	$news=simplexml_load_file('http://news.yandex.ru/index.rss');
//	var_dump($news);
	for ($i=0; $i < 10; $i++) { 
		echo '<br>TITLE '.$news->channel->item[$i]->title;
	    echo '<br>LINK '.$news->channel->item[$i]->link;
	    echo '<br>TEXT '.$news->channel->item[$i]->description;
	    echo '<br>DATE '.$news->channel->item[$i]->pubDate;
	    echo '<br>';
	}
		
}

