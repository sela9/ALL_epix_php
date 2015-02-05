<?php
echo "Hello, World!!!! =) <br>";
echo 2+1 ."<br>";
$myName = 'Olga';
echo 'Hello! My name is ' .$myName . '! I am the new superstar! <br>';

$age=30; // задачка про возраст

function agePhrase($age){
if ($age<20) 
	{echo 'будущее впереди!' ;
	}
elseif ($age >= 20 && $age <=30)
	{echo 'Пора подумать о жизни!!';
	}
else {echo 'готовься к пенсии!!';
	}
}

for ($age = 1; $age < 50; $age++) {
agePhrase($age);
echo '<br>';					}									



for ($i=1; $i<=100; $i++) //задачка про fizzbuzz
{
	if (!($i%3) && !($i%5)) { echo 'FIZZBUZZ <br>';} 
	elseif (!($i%3)) { echo 'FIZZ <br>';} 
	elseif (!($i%5)) { echo 'BUZZ <br>';} 
	else {echo ' ' . $i . ' ' ;}

}

// задачка про умножение
echo '<table border=1>';
for ($j=1; $j<=5; $j++)
	{
echo '<tr>';
//if ($j===1) {echo '<td></td>';}
	for ($k=1; $k<=5; $k++)
		{
		echo '<td>'	.$k*$j. '</td>';
		}
echo '</tr>';
						
	}
echo '</table>';

// считаем бактерии

$Bbegin = 23;
$Bend = 736254;
$i=0;

do {
$Bbegin = $Bbegin * 2;
$i++;
echo 'Время ' .$i. ' час, уже есть ' .$Bbegin. ' бактерий.<br>';

	} while ($Bbegin < $Bend);



//цена с налогом

function SummaSNDS ($p, $t)
{
$ssn=$p*(1+(0.01*$t));
echo 'Сумма равна ' .$p .', НДС равен ' .$t.'% <br>';
echo 'Сумма с НДС равна '.$ssn . '<br>';
}

$price = 1000;
$tax=18;

SummaSNDS ($price,$tax);

//сравнение типов
$values = array(true, false, 1, 0, -1, "1", "0" , "-1", null, array(), "php", "");

echo '<table border=1>';
for ($j=0; $j<=11; $j++)
	{
echo '<tr>';
	for ($k=0; $k<=11; $k++)
		{
		if ( $values[$j]==$values[$k] ) {
		echo '<td>true</td>'	;           }
		else {echo '<td>False</td>';}
		}
echo '</tr>';
						
	}
echo '</table>';

//
$hello = 'Hello, you';

var_dump($hello);

print_r($hello);