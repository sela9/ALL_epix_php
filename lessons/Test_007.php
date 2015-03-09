<form method="post">
<input type="text" placeholder="I'm looking for..." name="text"  />
<input type="submit" name="search" value="FIND IT!!" />
</form>
<?php

if (isset($_POST['search'])) {
	$search=file_get_contents('http://api.duckduckgo.com/?q='.$_POST['text'].'&format=json&pretty=1');
	$result=json_decode($search, true);
	foreach ($result["RelatedTopics"] as $key => $value) {
		echo '<br>Result '.$value['Result'];
		echo '<br>Icon '.$value['Icon']['URL'];
		echo '<br>FirstURL '.$value['FirstURL'];
		echo '<br>Text '.$value['Text'];
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
	}
}

