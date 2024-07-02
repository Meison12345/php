<?php
//1Получите массив букв этой строки.
$str = "abcde";
$b = str_split($str);
echo $b . " ";

foreach($b as $i){
	echo $i;
}?>

<br>

<?php
	//2Получите массив цифр этого числа.
	$str1 = strval(12345);
	echo gettype($str1);	
	$b = str_split($str1);
	echo " " . gettype($b);	
?>

<br>

<?php
	//3Переверните его:
	$str2 = strval(12345);
	$str2 = str_split($str2);
	$str2 = array_reverse($str2);
	
	foreach($str2 as $i){
		echo $i;
	}
?>

<br>

<?php
	//4Найдите сумму цифр этого числа
	$str2 = strval(12345);
	$str2 = str_split($str2);
	$sum = 0;

	foreach($str2 as $i){
		$sum += $i;
	}
	echo $sum
?>
<br><br><br><br>


<?php
//1Заполните массив целыми числами от 1 до 10.
$mas = range(1, 10);
foreach($mas as $i){
	echo $i;
}
?>
<br>
<?php
	//Заполните массив четными числами из промежутка от 1 до 100.
	for ($i=0; $i <= 100; $i++) { 
		if ($i%2==0) {echo $i;}
	}
	?>
<br>

<?php
	//Округлите эти дроби до одного знака в дробной части.
	$brokeMas = [1.456, 2.125, 3.32, 4.1, 5.34];

	foreach($brokeMas as $i){
		
	}
?>