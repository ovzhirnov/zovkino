<?php
//http_response_code(200);
header($_SERVER['SERVER_PROTOCOL']." 200 OK");
//Header("HTTP/1.1 200 OK");
//Header("Status: 200");
//Header("Last-Modified: ".gmdate("D, M d Y H:i:s",filemtime(basename($_SERVER['PHP_SELF'])))." GMT");
Header("Last-Modified: ".gmdate("D, M d Y H:i:s")." GMT");
Header("Connection: close");
?>
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

			
				$zapros = parse_url($_SERVER['REQUEST_URI']);
				$zapros=str_replace(".html","",$zapros['path']);
				$zapr = preg_split ("/-/", $zapros);
				$do=$zapr[0];
				$ganr=$zapr[1];
				if ($zapr[2])
				{$np=$zapr[2];}
				if ($zapr[0]=="/show")
					{
					switch ($ganr)
{
case 'all': $gnr='Все жанры'; break;
case 'action': $gnr='Боевики'; break;
case 'fantastic': $gnr='Фантастика'; break;
case 'mystic': $gnr='Мистика'; break;
case 'horror': $gnr='Ужасы'; break;
case 'honey': $gnr='Драма'; break;
case 'child': $gnr='Детские'; break;
case 'thriller': $gnr='Триллеры'; break;
case 'crash': $gnr='Катастрофа'; break;
case 'comedy': $gnr='Комедии'; break;
case 'music': $gnr='Музыкальные'; break;
case 'mult': $gnr='Анимационные'; break;
case 'otech': $gnr='Отечественные'; break;
case 'fentaz': $gnr='Фэнтази'; break;
case 'voen': $gnr='Военные'; break;
case 'vestern': $gnr='Вестерны'; break;
case 'detect': $gnr='Детективы'; break;
case 'kriminal': $gnr='Криминальные'; break;
case 'history': $gnr='Исторические'; break;
case 'document': $gnr='Документальные'; break;
case 'sport': $gnr='Спортивные'; break;
case 'erot': $gnr='Эротические'; break;
case 'biogr': $gnr='Биографические'; break;
case 'roman': $gnr='Любовные романы'; break;
case 'advent': $gnr='Приключения'; break;
case 'obuch': $gnr='Обучающие'; break;
} 
					$titl="Смотреть фильмы ".$gnr." онлайн, скачать фильмы ".$gnr." новинки кино ".$gnr." кино бесплатно без регистрации с торрента с файлообменников";
					$descr="Смотреть фильмы ".$gnr." онлайн, скачать фильмы ".$gnr." новинки кино ".$gnr." кино бесплатно без регистрации с торрента с файлообменников";
					$keyw="Смотреть фильмы ".$gnr." онлайн, скачать фильмы ".$gnr.", новинки кино ".$gnr.", бесплатно кино, боевики, фантастика, мистика, ужасы, мелодрамы, детские, триллеры, катастрофы, комедии, музыкальные, анимационные, мультфильмы, отечественные, фентази, военные, вестерн, детективы, криминал, исторические, документальные, спортивные, эротические, биографические, любовные романы, приключения, обучающие, без регистрации, с торрента, с летитбит, с letitbit, с vip-file, с файлообменников";					}
				if ($zapr[1]=="download")
					{$do=str_replace("/","",$do);
					$sql = "SELECT * FROM ".$table_name." WHERE ID='".$do."'";
					$q=Mysql_query($sql, $conn);
					$row=Mysql_fetch_array($q);
					$name=$row['name'];
					$about=$row['about'];
					$genre=$row['genre'];
					$year=trim($row['year']);
					$cast=$row['cast'];

					$titl="Смотреть фильм ".$name." онлайн, скачать фильм ".$name." (".$year." ".$genre.") кино бесплатно без регистрации с торрента с файлообменников";
					$about=str_replace("<strong>","",$about);
					$about=str_replace("</strong>","",$about);
					$descr="Смотреть фильм ".$name." онлайн, скачать фильм ".$name." (".$year."),кино ".$genre.",".substr($about,0,200)." с торрента с файлообменников";
					$keyw="Смотреть фильм ".$name." онлайн, скачать фильм ".$name." (".$year."), ".$genre.", кино ".$name.", скачать бесплатно кино, ".$cast.", с торрента, без регистрации, с файлообменников";
										
					
					}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $titl; ?></title>
<meta name="Title" content='<?php echo $titl; ?>' />
<META http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<META name="description" content="<?php echo $descr; ?>">
<META name="keywords" content="<?php echo $keyw; ?>">
<meta name="revisit-after" content="7 day">
<META content="index, follow" name="robots">
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="icon" href="favicon.png" type="image/x-icon">
</head>


<body>
<div id="main_body">

	<table border="0" id="tab">
		<tr>
			<td width="1200" height="200" colspan="3">
			<?php require "header.php"; ?>			
			</td>
		</tr>
		<tr>
			<td width="200" valign="top">
			<?php require "basic_menu.php"; ?>
			</td>

			<td width="800" valign="top">
<br />
<!--<center>
<script language="javascript">
document.write ("<ifr"+"ame src=\"ht"+"tp://out.pladform.ru/player?pl=40379&playlistid=35392\" width=\"720\" height=\"480\" fr"+"ameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowfullscreen></if"+"rame>");
</script>
</center><br />-->            
			<?php 
				$zapros = parse_url($_SERVER['REQUEST_URI']);
				$zapros=str_replace(".html","",$zapros['path']);
				$zapr = preg_split ("/-/", $zapros);
				$do=$zapr[0];
				$ganr=$zapr[1];
				if ($zapr[2])
				{$np=$zapr[2];}
				if ((!$zapr[0]) | (!$zapr[1]))
				{
				echo "<noindex><center><h1>ДАННЫЙ ЗАПРОС НЕ ВЫПОЛНЕН</h1></center></noindex>";	
				}
				else
				{
				if ($zapr[0]=="/show")
					{
					require ("presents.php");
					//require ('tegi_show.php');
					}
				if ($zapr[1]=="download")
					{
					$do=str_replace("/","",$do);
					require ("download.php");
					//require ('tegi_show.php');
					}
				}
			?>
<center>
<noindex>

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
