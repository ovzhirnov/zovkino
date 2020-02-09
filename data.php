<?php
	$date=date("Ymj");
	$year=substr($date,0,4);
	$month=substr($date,4,2);
	$day=substr($date,6,2);
	$mon=array ("","Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря");
	$month=$mon[$month*1];
	echo $day." ".$month." ".$year."г.";
	?>
