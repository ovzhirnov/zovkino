<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Поиск</title>
<META http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="icon" href="favicon.png" type="image/x-icon">
<script language="javascript" src="change.js"></script>
<script language="javascript" src="show.js"></script>

</head>


<body>
<div id="main_body">

	<table border="0" onClick="showr();">
		<tr>
			<td width="1200" height="280" colspan="3">
			<?php require "header.php"; ?>			
			</td>
		</tr>
		<tr>
			<td width="200" valign="top">
			<?php require "basic_menu.php"; ?>
			</td>
			<td width="800" valign="top">
	


<?php
if ($_POST['searchstring'] && strlen($_POST['searchstring'])>=4)
{	
	$searchstring=$_POST['searchstring'];
	$searchstring=substr ($searchstring,0,40);
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

$sql = "SELECT * FROM ".$table_name." WHERE name=' ".$searchstring."'";
$q=Mysql_query($sql, $conn);
$row=Mysql_fetch_array($q);
		if ($row)	{
					$do = $row['ID'];
					require ("download.php");
					require ('tegi_show.php');

					}
		else
					{
					echo "<div class='about_films'>По Вашему запросу - < <font color='#ff3333'>".$searchstring."</font> > ничего не найдено<br><br>";	
					
$sql = "SELECT * FROM ".$table_name." WHERE name LIKE \"%".$searchstring."%\"" ;
					$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер
					$ke=Mysql_num_rows($q); //количество элементов в базе
					$sch=0;
							
						while ($zap = mysql_fetch_array($q))
						{
								$ID=$zap['ID'];
								$year=$zap['year'];
								$name=$zap['name'];
								$orig_name=$zap['orig_name'];
								$genre=$zap['genre'];
								$cast=$zap['cast'];
								$pic_name=$zap['pic_name'];
							if ($sch == 0) {echo "Возможно Вы искали :<br><br>";}
							$sch++;
							echo "<a href='$ID-download.html' title='скачать фильм $name'>".$name." (".$orig_name.")</a><br>Год выхода: ".$year."<br>Жанр: ".$genre."<br>В ролях: ".$cast."<br><hr>";
						if ($sch>=15){break;}	
						}
							
						if ($sch>0) {echo "<br><br>Найдено фильмов: ".$sch;}
						echo "</div>";
					}
}
	else {echo "<div class='about_films'>Слишком мало информации для поиска!</div>";}
?>

<center>
<noindex>
<script type="text/javascript"><!--
google_ad_client = "pub-9689762761920713";
/* 468x60, создано 12.04.10 */
google_ad_slot = "3941232635";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</noindex>
</center>
			</td>
			<td width="200" valign="top">
            	<?php require "right_col.php"; ?>
            </td>
		</tr>
	</table>
		  
	<?php require "footer.php"; ?>
</div>
</body>
</html>
