<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Документ без названия</title>
</head>

<body>
<?php
$conn = Mysql_connect("localhost", "zovkinor_oleg", "si160111tes") 
or die("Невозможно установить соединение: ". Mysql_error());
$database="zovkinor_films";
$table_name="films";
Mysql_select_db($database); //выбор базы
mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");



					$sql = "SELECT * FROM ".$table_name." WHERE name LIKE \"%".$wdata[2]."%\"" ;
					$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер
					while ($zap = mysql_fetch_array($q))
							{
								$ID=$zap['ID'];
								$name=$zap['name'];
								$orig_name=$zap['orig_name'];
								$pic_name=$zap['pic_name'];
								echo "<br><font color='#FF0000'><h2>ТАКИЕ ДАННЫЕ УЖЕ ИМЕЮТСЯ В БАЗЕ</h2></font> ";
								echo "ID - ".$ID."<br>name - ".$name."<br>orig_name - ".$orig_name."<br><br>";
							}
			
?>

</body>
</html>