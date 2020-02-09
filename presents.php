<?php //вход€щие: $np-номер страницы, $ganr-жанр
$gnr1="";
switch ($ganr)
{
case 'action': $gnr='оевик'; break;
case 'fantastic': $gnr='антасти'; break;
case 'mystic': $gnr='исти'; break;
case 'horror': $gnr='жас'; break;
case 'honey': $gnr='рама'; break;
case 'child': $gnr='етски'; break;
case 'thriller': $gnr='риллер'; break;
case 'crash': $gnr='атастроф'; break;
case 'comedy': $gnr='омеди'; break;
case 'music': $gnr='узыкальн'; break;
case 'mult': $gnr='нимацион'; $gnr1='ультфил'; break;
case 'otech': $gnr='течествен'; break;
case 'fentaz': $gnr='энтаз'; break;
case 'voen': $gnr='оенн'; break;
case 'vestern': $gnr='естерн'; break;
case 'detect': $gnr='етектив'; break;
case 'kriminal': $gnr='риминал'; break;
case 'history': $gnr='сторич'; break;
case 'document': $gnr='окументал'; $gnr1='научн'; break;
case 'sport': $gnr='портивн'; break;
case 'erot': $gnr='роти'; break;
case 'biogr': $gnr='иографичес'; break;
case 'roman': $gnr='оман'; break;
case 'advent': $gnr='риключен'; break;
case 'obuch': $gnr='бучающ'; break;
} 
function show_films($q,$s)
{
$ID=Mysql_result($q,$s,0);
$year=Mysql_result($q,$s,1);
$name=Mysql_result($q,$s,2);
$orig_name=Mysql_result($q,$s,3);
$genre=Mysql_result($q,$s,4);
$rezh=Mysql_result($q,$s,5);
$cast=Mysql_result($q,$s,6);
$time=Mysql_result($q,$s,7);
$about=Mysql_result($q,$s,8);
$format=Mysql_result($q,$s,9);
$translate=Mysql_result($q,$s,10);
$video=Mysql_result($q,$s,11);
$audio=Mysql_result($q,$s,12);
$value=Mysql_result($q,$s,13);
$data=Mysql_result($q,$s,14);
$picture=Mysql_result($q,$s,15);
$main_url=Mysql_result($q,$s,17);
$sec_url=Mysql_result($q,$s,18);
$d_load=Mysql_result($q,$s,19);

	echo "<table height='19' width='800' border='0' cellpadding='0' cellspacing='0'>
	<tr><td background='images/pres_title.jpg'><div class='pres_title'>&nbsp;&nbsp;Ќазвание:&nbsp;".substr($name,0,55)." | ".substr($orig_name,0,55)."</div></td></tr>
	</table>";
	echo "<table border='0' cellpadding='0' cellspacing='0'><tr><td width='200' align='center'>";
	echo "<img src='$picture' width='190' title='смотреть онлайн и скачать фильм $name' border='0'></td><td width='600' bgcolor='#bbbbFF' class='about_films'>";
	if ($name<>"") {
			echo "Ќазвание:&nbsp;<b>".$name."</b><br>";}
	if ($orig_name<>"") {
			echo "ќригинальное название:&nbsp;<b>".$orig_name."</b><br><br>";}
	if ($year<>"") {
			echo "√од выхода:&nbsp;<b>".$year."</b><br>";}
	if ($genre<>"") {
			echo "∆анр:&nbsp;<b>".$genre."</b><br><br>";}
	if ($rezh<>"") {
			echo "–ежиссер:   &nbsp;<b>".$rezh."</b><br>";}
	if ($cast<>"") {
			echo "¬ главных рол€х:   &nbsp;<b>".$cast."</b><br><br>";}
	if ($about<>"") {
			echo " раткое описание:   &nbsp;<b>".substr($about,0,200)."...</b><a href='$ID-download.html' title='смотреть онлайн и скачать фильм $name'>[>>читать далее...]</a><br><br>";}
	if ($time<>"") {
			echo "ѕродолжительность:&nbsp;<b>".$time."</b><br>";}
		echo "</td></tr></table>";
	echo "<table height='19' width='800' border='0' cellpadding='0' cellspacing='0' background='images/pres_title.jpg'>
	<tr>
	<td width='200' class='pres_title'><a href='$ID-download.html' title='смотреть онлайн и скачать фильм $name'>—мотреть онлайн / —качать</a>&nbsp;&nbsp;</td>
	<td width='200' class='pres_title'>|&nbsp;&nbsp;‘ормат:&nbsp;".substr($format,0,15)."&nbsp;&nbsp;</td>
	<td width='200' class='pres_title'>|&nbsp;&nbsp;–азмер:&nbsp;".$value."&nbsp;&nbsp;</td>
	<td width='200' class='pres_title'>|&nbsp;&nbsp;—качали:&nbsp;".$d_load."&nbsp;раз</td>
	</tr></table><br>";
}
$conn = Mysql_connect("localhost", "zovkinor_oleg", "si160111tes") 
or die("Ќевозможно установить соединение: ". Mysql_error());
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
$q=Mysql_query($sql, $conn) or die(); //отправл€ем запрос на сервер
$ke=Mysql_num_rows($q); //количество элементов в базе
$ks=10; //количество элементов на странице

	if ($ganr=='all')//все жанры
	{
	$beg_row=($np-1)*$ks; //вычисление начала
	$end_row=$np*$ks-1;   //и конца выборки
		if ($end_row>$ke-1){$end_row=$ke-1;}//конец выборки на последней странице
	for ($s=$beg_row;$s<=$end_row;$s++) 
	{show_films($q,$s);}
	}
	else
	{
	$r=1;
	for ($w=0;$w<=$ke-1;$w++)
	{
		$g=Mysql_result($q,$w,4);
		if (strstr($g,$gnr) || strstr($g,$gnr1)){$a[$r]=$w;$r++;}//создаем массив $a[] из номеров строк с нужным жанром
	}
	$ke=$r-1;
	$beg_row=($np-1)*$ks; //вычисление начала
	$end_row=$np*$ks;   //и конца выборки
		if ($end_row>$r-1){$end_row=$r-1;}//конец выборки на последней странице
	$beg_row++;
		for ($s=$beg_row;$s<=$end_row;$s++) 
		{show_films($q,$a[$s]);}
	}

// ѕодсчет количества выводимых страниц в зависимости от количества элементов
$kolstr=ceil($ke/$ks); //количество страниц, дополненное до следующего целого числа

// вывод ссылок: предыдущ,текуща€,следующ.
echo "<table width=100% border='0' cellpadding='0' cellspacing='0'><tr><td width='275'></td><td class='menu_b' align='center' width='100' height='40' 
id='href1' onMouseOver='mOverHref(this.id)' onMouseOut='mOutHref(this.id)'>";
if (($np-1)>0){echo "<a href='show-$ganr-".($np-1).".html'>предыдуща€</a>";}
echo "</td><td class='np' width='50' height='40' background='images/np.jpg'>".$np."</td><td class='menu_b' align='center' width='100' height='40'
id='href2' onMouseOver='mOverHref(this.id)' onMouseOut='mOutHref(this.id)'>";
if (($np+1)<=$kolstr){echo "<a href='show-$ganr-".($np+1).".html'>следующа€</a>";}
echo "</td><td width='275'></td></tr><tr>
		<td bgcolor='#ffffff' width='800' colspan='5'>";
//echo "</div>";

// показываем ссылки на все страницы
echo "<div align='center'>";
$idnp='ref';
if ($np==1) {$idnp='pres_ref';}
echo "<a id=$idnp href='show-$ganr-1.html'>(&nbsp;1&nbsp;)</a>...";
if ($kolstr>=10)
{
if ($np>=6 & $np<=($kolstr-5))
{
for ($s=($np-4);$s<=($np+4);$s++)
	{
	if ($s==$np)
	{echo "<a id='pres_ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//текуща€ страница
	else 
	{echo "<a id='ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//показываем ссылки на следующие страницы
	}
}
elseif ($np<6)
{
for ($s=2;$s<=10;$s++)
	{
	if ($s==$np)
	{echo "<a id='pres_ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//текуща€ страница
	else 
	{echo "<a id='ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//показываем ссылки на следующие страницы
	}
}
elseif ($np>($kolstr-5))
{
for ($s=($kolstr-9);$s<=($kolstr-1);$s++)
	{
	if ($s==$np)
	{echo "<a id='pres_ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//текуща€ страница
	else 
	{echo "<a id='ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//показываем ссылки на следующие страницы
	}
}
}
else
{
for ($s=2;$s<=$kolstr;$s++)
	{
	if ($s==$np)
	{echo "<a id='pres_ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//текуща€ страница
	else 
	{echo "<a id='ref' href='show-$ganr-$s.html'>(&nbsp;$s&nbsp;)</a>";}//показываем ссылки на следующие страницы
	}

}
$idnp='ref';
if ($np==$kolstr) {$idnp='pres_ref';}
if ($kolstr>10)
{echo "...<a id=$idnp href='show-$ganr-$kolstr.html'>(&nbsp;$kolstr&nbsp;)</a>";}
echo "</div>";
echo "</td></tr></table>";
?>