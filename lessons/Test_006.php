<?php
$now= time ();
$date = time() + 24 * 60 * 60;
echo date('Y-m-d H:i:s A', $now);
echo '<br>';
echo date('Y-m-d H:i:s A', $date);

echo '<br>';

//date_default_timezone_set('Moskow');

echo '<br>';
setlocale(LC_TIME, "fi_FI");
echo strftime(" in English is %A,");

echo '<br>';
setlocale(LC_TIME, "de_DE");
echo strftime(" in German %A.\n");
echo '<br>';
setlocale(LC_TIME, "ru_RU");
echo strftime(" in German %A.\n");
echo '<br>';

//echo date("M-d-Y", mktime(0, 0, 0, 07, 14, 2015));
echo 'до 14 июля осталось'.((mktime(0, 0, 0, 07, 14, 2015)-mktime())/(24*60*60)).' дней';
echo '<br>';
$now = new \DateTime();
echo '<br>';
echo 'через 5 месяцев будет '.date('Y-m-d',time()+5*30*24*60*60);
$now->add(new \DateInterval('P5M0D'));
echo '<br>объект:'.($now->format('d.m.Y'));
echo '<br>';
echo '15 дней назад было '.date('Y-m-d',time()-15*24*60*60);
echo '<br>';
$now = new \DateTime();
$now->sub(new \DateInterval('P0M15D'));
echo '<br>объект:'.($now->format('d.m.Y'));
echo '<br>';





$raw = '27. 10. 1985';
$start = \DateTime::createFromFormat('d. m. Y', $raw);
echo 'Start date: ' . $start->format('m/d/Y') . "\n";
$now = new \DateTime();
//echo 'Time to change your life is: ' . $now->format('H:i:s d.m.Y') . "\n";
echo '<br>';
$rawdate = "17.02 2015";
$date = \DateTime::createFromFormat('d.m Y',$rawdate);
$now = new \DateTime();
if ($date > $now) { echo $date->format('d.m.Y').'в будущем';}
