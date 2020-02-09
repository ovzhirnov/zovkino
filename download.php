<?php // входящие: $do- номер строки базы с выбранным фильмом
mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");

$sql = "SELECT * FROM ".$table_name." WHERE ID='".$do."'";
$q=Mysql_query($sql, $conn);
$row=Mysql_fetch_array($q);
$s=$do;
$ID=$row['ID'];
$year=$row['year'];
$name=$row['name'];
$orig_name=$row['orig_name'];
$genre=$row['genre'];
$rezh=$row['rezh'];
$cast=$row['cast'];
$time=$row['time'];
$about=$row['about'];
$format=$row['format'];
$translate=$row['translate'];
$video=$row['video'];
$audio=$row['audio'];
$value=$row['value'];
$data=$row['data'];
$picture=$row['picture'];
$main_url=$row['main_url'];
$sec_url=$row['sec_url'];
$d_load=$row['d_load'];

	echo "<table height='19' width='800' border='0' cellpadding='0' cellspacing='0'>
	<tr><td background='images/pres_title.jpg'><div class='pres_title'>Название:&nbsp;".$name." | ".$orig_name."</div></td></tr>
	</table>";
	echo "<table border='0' cellpadding='0' cellspacing='0'><tr><td width='200' align='center'>";
	echo "<img src='$picture' width='300' title='скачать фильм $name' border='0'></td><td width='480' bgcolor='#ddddFF' class='dload_films'>";
		
	if ($name<>"") {
			echo "Название:&nbsp;<b><h1><strong>".$name."</strong></h1></b>";}
	if ($orig_name<>"") {
			echo "Оригинальное название:&nbsp;<b>".$orig_name."</b><br /><br />";}
	if ($year<>"") {
			echo "Год выхода:&nbsp;<b>".$year."</b><br />";}
	if ($genre<>"") {
			echo "Жанр:&nbsp;<b>".$genre."</b><br /><br />";}
	if ($rezh<>"") {
			echo "Режиссер:&nbsp;<b>".$rezh."</b><br />";}
	if ($cast<>"") {
			echo "В гл. ролях:&nbsp;<b>".$cast."</b><br /><br />";}
	if ($time<>"") {
			echo "Продолжительность:&nbsp;<b>".$time."</b><br /><br />";}
	if ($format<>"") {
			echo "Качество:&nbsp;<b>".$format."</b><br />";}
	if ($translate<>"") {
			echo "Озвучка:&nbsp;<b>".$translate."</b><br /><br />";}
	if ($video<>"") {
			echo "Видео:&nbsp;<b>".$video."</b><br />";}
	if ($audio<>"") {
			echo "Аудио:&nbsp;<b>".$audio."</b><br /><br />";}
	if ($value<>"") {
			echo "Размер:&nbsp;<b>".$value."</b><br /><br />";}
	if ($d_load<>"") {
			echo "Скачали:&nbsp;<b>".$d_load."&nbsp;раз</b><br />";}
		
		echo "</td></tr></table>
	<table width='800' border='0' cellpadding='0' cellspacing='0'>
	<tr><td bgcolor='#ddddFF' class='dload_films' align='center'><br />";
	if ($about<>"") {
			echo "Описание фильма:<br /><br /><b>".$about."</b><br />";}
	
//	http://letitbit.net/download/43703.4078f6e9e9f64aa802964f5d3644/Zeleznoe_serce.avi.html
	$sql = "SELECT * FROM ".$table_name." WHERE ID='".$ID."' LIMIT 1";
	$q=Mysql_query($sql, $conn);
	$row=Mysql_fetch_array($q);
	$url=$row['main_url'];
	$url=$row['main_url'];
	

	
	$url = str_replace('http://letitbit.net/download/','http://moevideo.net/video.php?file=',$url);
	$pos = strrpos($url,'/');
	$url = substr($url,0,$pos);
	echo "<div id='tab1'><hr><b><h2><strong>Смотреть фильм - ".$name." онлайн</strong></h2></b><br />";
//	echo "Кинотеатр №1<br />";
	echo "<script language=\"JavaScript\" type=\"text/javascript\" src='".$url."&width=600&height=450'></script><br /><br />";


/*	$url = str_replace('http://letitbit.net/download/','http://moevideo.net/framevideo/',$url);
	$pos = strrpos($url,'/');
	$url = substr($url,0,$pos);
	$url .= "&width=600&height=450";
	echo "Кинотеатр №2<br />";
	echo "<iframe width=\"640\" height=\"360\" src=\"http://moevideo.net/framevideo".$url."\"  frameborder=\"0\" allowfullscreen></iframe>";
	*/
			
	echo "<hr><b>Скачать:</b><br /><br />";
	echo "скачать по основной ссылке одним файлом<br /><noindex><a href='dl.php?fo=letitbit&id=$s' rel='nofollow' target='_blank'><img src='images/dlbutton.jpg' title='скачать фильм $name'></a></noindex><br /><div class='progs_h'>после скачивания загрузчика, в открывшемся окне, нажмите кнопку - &lt;ЗАПУСТИТЬ&gt;<br /><br /></div>";
	echo "скачать с зеркала c <noindex><a href='dl.php?fo=letitbit&id=$s' title='скачать фильм $name c Letitbit.net' rel='nofollow' target='_blank'>Letitbit.net</a></noindex> одним файлом<br /><br />";

	echo "скачать с зеркала c <noindex><a href='dl.php?fo=vip-file&id=$s' title='скачать фильм $name c Vip-file.com' rel='nofollow' target='_blank'>Vip-file.com</a></noindex> одним файлом<br /><hr>";
//	echo "База фильмов - <noindex><a href='http://getfiles.files-allsearch.ru/?query=".trim($name)."&wkey=8486' rel='nofollow' target='_blank'>Скачать фильм - &laquo;$name&raquo;</a></noindex>";
	echo "Скачать торрент ссылку с rutor.org - <noindex><a href='http://new-rutor.org/search/0/0/000/0/".trim($name)."' rel='nofollow' target='_blank'>&laquo;$name&raquo;</a></noindex>
	</div>
	<br /><hr><br />
	Так же рекомендуем к просмотру следующие фильмы схожей тематики:
	<br /><br /></td></tr>	
	</table>
		
	<table width='800' border='0' cellpadding='0' cellspacing='0'><tr>";
$genre=substr($genre,0,5);
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

$sql = "SELECT * FROM ".$table_name; //создаем SQL запрос
$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер
$ke=Mysql_num_rows($q); //количество элементов в базе
$ii=0;
	for ($w=0;$w<=$ke-1;$w++)
	{

$row=Mysql_fetch_array($q);
$g=Mysql_result($q,$w,4);
$g=substr($g,0,7);
$ID=$row['ID'];

if (strstr($g,$genre) and $ID<>$do)
{
$year=$row['year'];
$name=$row['name'];
$orig_name=$row['orig_name'];
$picture=$row['picture'];

	echo "<td width='260' bgcolor='#ddddFF' class='dload_films' align='center'>";
	echo "<img src='$picture' width='190' title='скачать фильм $name' border='0'><br />
	<a href='$ID-download.html' titlte='скачать фильм $name' title='Скачать $name бесплатно'>$name<br />$year</a>
	</td>";
$ii++;
}
if ($ii>=3) {break;}
	}
	echo "</tr></table>";
?>