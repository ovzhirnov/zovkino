<?php //скрипт записи всех данных
session_start();
?>
<html>
<head>
	<META http-equiv=Content-Type content="text/html; charset=windows-1251">
	<title>save grab</title>
</head>

<body>
<?php
$conn = Mysql_connect("localhost", "kinozov01_oleg", "si160111tes") 
or die("Невозможно установить соединение: ". Mysql_error());
$database="kinozov01_films";
$table_name="films";
Mysql_select_db($database); //выбор базы
mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");


if ($_SESSION['name'] || $_SESSION['orig_name']) //если был запрос на запись данных о фильме
{
//принимаем данные из переменных окружения
//$finishlet=$_POST['finishlet'];
//$finishvip=$_POST['finishvip'];

$year=$_SESSION['year'];
$name=$_SESSION['name'];
$orig_name=$_SESSION['orig_name'];
$genre=$_SESSION['genre'];
$rezh=$_SESSION['rezh'];
$cast=$_SESSION['cast'];
$time=$_SESSION['time'];
$about=$_SESSION['about'];
$format=$_SESSION['format'];
$translate=$_SESSION['translate'];
$video=$_SESSION['video'];
$audio=$_SESSION['audio'];
$value=$_SESSION['value'];
$ourletiturl=$_SESSION['ourletiturl'];

$rf=$_SESSION['rf'];
$picurl=$_SESSION['picurl'];
$data=date("Ymj");

//исключаем двойные кавычки из переменных
$name=str_replace("\"","'",$name);
$orig_name=str_replace("\"","'",$orig_name);
$about=str_replace("\"","'",$about);

$link=$rf;//url картинки для граба

//грабим картинку
$file=@fopen($link,'rb');
if ($file)
{
$readpic = '';
while (!feof($file))
{
  $readpic .= fread($file, 8192);
} 
	fclose($file);
	echo "<font color='#00FF00'>картинка ".$link." считана</font><br>";
}
else {echo "<font color='#FF0000'>картинки не существует</font><br>";}


//записываем картинку
$fp=@fopen($picurl,'w');
if ($fp)
{if ($readpic)
{
	$z=fputs($fp,$readpic);
	fclose($fp);
	echo "<font color='#00FF00'>картинка ".$picurl." записана</font><br>";
}
else
{echo "<font color='#FF0000'>пустой файл не пишем!</font>";}
}
else
{echo "<font color='#FF0000'>запись не удалась!</font>";}

//готовим запрос на запись  всех данных в базу

$sql = "INSERT INTO ".$table_name."(year,name,orig_name,genre,rezh,cast,time,about,format,translate,video,audio,value,data,picture,ourletiturl) VALUES 
(\"$year\",\"$name\",\"$orig_name\",\"$genre\",\"$rezh\",\"$cast\",\"$time\",\"$about\",\"$format\",\"$translate\",\"$video\",\"$audio\",\"$value\",\"$data\",\"$picurl\",\"$ourletiturl\")";

$q=Mysql_query($sql, $conn) or die("Запрос не выполнен!"); //отправляем запрос на сервер
if ($q) {echo "<br><font color='#00FF00'>запись в базу успешно произведена!</font>";}
?>
<div style="position:absolute; left:900px; top:300px;">
<form action="javascript: if (confirm('Удалить последнюю запись из базы?')) {document.location.href='grab.php';}" method="post" name="delete">
<input type="hidden" value="1" name="del">
<input type="submit" value="стереть последнюю запись в базе" name="delete" style="color:#F00;">
</form>
</div>
<?php
}

else 
{
if ($_POST['listurl']) //если был запрос на запись урлов из файлообменников
{

$listurl=$_POST['listurl'];//список урлов
$listurl= preg_split ('/\n/', $listurl);

$i=0;
$ss=0;
while ($listurl[$i])
{
if (strstr($listurl[$i],"http://letitbit.net/download/"))//если текущая ссылка из letitbit
{
$ourletiturl=str_replace("http://letitbit.net/download/","",$listurl[$i]);
}
if (strstr($listurl[$i],"http://vip-file.com/download/"))//если текущая ссылка из vip-file
{
$ourletiturl=str_replace("http://vip-file.com/download/","",$listurl[$i]);
}

$s=strrpos($ourletiturl,"/");
$ourletiturl=substr($ourletiturl,$s);
$ourletiturl=str_replace(".html","",$ourletiturl);
$ourletiturl=trim($ourletiturl);
$ourletiturl=str_replace("/","",$ourletiturl);

if (strstr($listurl[$i],"http://letitbit.net/download/"))//если текущая ссылка из letitbit
{
$sql = "UPDATE $table_name SET main_url = '$listurl[$i]' WHERE ourletiturl = '".$ourletiturl."'";//запрос на запись урлы в соответствующую строку и поле
}
if (strstr($listurl[$i],"http://vip-file.com/download/"))//если текущая ссылка из vip-file
{
$sql = "UPDATE $table_name SET sec_url = '$listurl[$i]' WHERE ourletiturl = '".$ourletiturl."'";//запрос на запись урлы в соответствующую строку и поле
}

$q=Mysql_query($sql, $conn) or die("Запрос не выполнен!"); //отправляем запрос на сервер
if ($q) {$ss++;}
$i++;
}
echo "Произведено - ".$ss." записей в базу";
}
}
$sql = "ALTER TABLE `films` ORDER BY `ID` DESC";//сортировка базы по убыванию ID
$q=Mysql_query($sql, $conn) or die("Запрос не выполнен!"); //отправляем запрос на сервер
session_destroy();//уничтожаем переменные сессии
Mysql_close($conn); //закрываем соединение

?>
<br><input type="button" value="назад" onClick="javascript: document.location.href='grab.php';"> 
</body>
</html>
