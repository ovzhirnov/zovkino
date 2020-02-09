<?php if (isset($_COOKIE['pass'])=="enter")
{
	session_start();
?>
<html>
<head>
	<META http-equiv=Content-Type content="text/html; charset=windows-1251">
	<title>grab</title>
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

$file_s_url='grab_urls.php';
if ($_POST['clearurl']=='1')
{
	$fp=fopen($file_s_url,'w+');
	if ($fp) {$fw=fwrite($fp,""); fclose($fp); echo "файл с урлами очищен!!!<br>";}
	$clearurl=0;
}
if ($_POST['del']=='1')
{
$sql = "SELECT * FROM ".$table_name; //создаем SQL запрос
$q=Mysql_query($sql, $conn) or die('Запрос 0 не выполнен!'); //отправляем запрос на сервер
$ID=Mysql_result($q,0,0);

$sql = "DELETE FROM ".$table_name." WHERE ID='".$ID."'";
$q=Mysql_query($sql, $conn) or die("Запрос 1 не выполнен!"); //отправляем запрос на сервер
	if ($q)
	{
	echo "<div style='position:absolute; left:940px; top:560px;'><font color='#FF0000'>Последняя запись успешно удалена!</font></div>";
	$sql = "ALTER TABLE `films` AUTO_INCREMENT = $ID";
	$q=Mysql_query($sql, $conn) or die("Запрос 2 не выполнен!"); //отправляем запрос на сервер
	}
}

if (!$_POST['graburl'] && !file($file_s_url)<>"")
{ ?>
Работаем с сайтом: http://obnovi.com
<form action="grab.php" method="post" name="graburl">
<br>Введите адрес страницы с фильмами для граббинга:<br>
<input type="text" size="60" name="graburl">
<input type="submit" value="поехали" name="go">
<input type="reset" value="стереть" name="стереть">
</form><hr>
<br>Введите ссылки из файлообменника для записи в базу:
<form action="save_grab.php" method="post" name="fobmennik">
<textarea rows="20" cols="50" name="listurl"></textarea><br>
<input type="submit" value="записать в базу" name="write">
<input type="reset" value="стереть" name="стереть">
</form> 
<div style="position:absolute; left:900px; top:580px;">
<form onSubmit="javascript: if (confirm('Удалить последнюю запись из базы?')) {document.location.href='grab.php';}" method="post" name="delete">
<input type="hidden" value="1" name="del">
<input type="submit" value="стереть последнюю запись в базе" name="delete" style="color:#F00;">
</form>
</div>
<?php }
else
{
$graburl=$_POST['graburl'];//url страницы для граба

if (!file($file_s_url)<>"") //если файл с урлами пустой
{//считываем урлы с переданного адреса и записываем в файл
$url_file=fopen($graburl,'rb');
if ($url_file)
{
$url_readfile = ''; //содержимое страницы
while (!feof($url_file))
{
  $url_readfile .= fread($url_file, 8192);
} 
	fclose($url_file);
}
else {echo "страницы не существует<br>";}
$save_url='';
$rf=trim(chop($url_readfile));
$startstr=")</font></a> <a href=\"";//начальная строка для поиска
$endstr="\"><font";
while (strstr($rf,$startstr))//начальная строка для поиска
{
$s1=strpos($rf,$startstr,0);//начальная строка для поиска
$s2=strpos($rf,$endstr,$s1);//конечная строка для поиска
$s=$s2-$s1;
$stemp=substr($rf,$s1,$s);
$stemp=str_replace($startstr,'',$stemp);
$save_url .=$stemp."\n";
$rf=substr($rf,($s2+10));
}
$fp=fopen($file_s_url,'w+');
if ($fp) {$fw=fwrite($fp,$save_url); fclose($fp);}
}


//считываем первую строку из файла с урлами в $link и удаляем ее из файла
$f=file($file_s_url);
$link=trim(str_replace("\n","",$f[0]));
echo "В списке осталось ".(count($f)-1)." урлов<br>";
for ($ii=0;$ii<=(count($f)-1);$ii++)
{
	$newf.=$f[$ii+1];
}
$fp=fopen($file_s_url,'w+');
if ($fp) {$fw=fwrite($fp,$newf); fclose($fp);}

	
$strneedle=array ("","<b>Год выхода</b>: ","<b>Фильм</b>: ","<b>Оригинальное название</b>: ","<b>Жанр</b>: ","<b>Режиссер</b>:","<b>В ролях</b>: ",
"<b>Продолжительность</b>: ","О фильме</b>: ","<b>Качество</b>: ","<b>Перевод</b>: ","Видео:","Аудио:","<b>Размер</b>: ");
$strend=array ("","<br","<br","<br","<br","<br","<br","<br","<br","<br","<br","<br>","<br>","<br");
$file=fopen($link,'rb');
if ($file)
{
$readfile = '';
while (!feof($file))
{
  $readfile .= fread($file, 8192);
} 
	fclose($file);
}
else {echo "страницы не существует<br>";}

for ($i=1;$i<=(count($strneedle)-1);$i++)
{
$rf=trim(chop($readfile));
$s1=strpos($rf,$strneedle[$i],0);
	if ($i==1 && !$s1) {$strneedle[$i]="<b>Год выхода:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>Год выхода: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>Год выпуска:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>Год выпуска</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>Фильм:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>Мультфильм</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>Мультфильм:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==3 && !$s1) {$strneedle[$i]="<b>Оригинальное название:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==3 && !$s1) {$strneedle[$i]="<b>Оригинпльное название:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==4 && !$s1) {$strneedle[$i]="<b>Жанр:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==5 && !$s1) {$strneedle[$i]="<b>Режиссер:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==5 && !$s1) {$strneedle[$i]="<b>Режиссёр</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>В ролях: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>В ролях:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>Актёры</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==7 && !$s1) {$strneedle[$i]="<b>Продолжительность:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==8 && !$s1) {$strneedle[$i]="О фильме:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==8 && !$s1) {$strneedle[$i]="<b>О фильме: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==9 && !$s1) {$strneedle[$i]="<b>Качество:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==10 && !$s1) {$strneedle[$i]="<b>Перевод:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==13 && !$s1) {$strneedle[$i]="<b>Размер:</b>"; $s1=strpos($rf,$strneedle[$i],0);}

if ($s1)
{
$s2=strpos($rf,$strend[$i],$s1);
$s=$s2-$s1;
$rf=substr($rf,$s1,$s);
$wdata[$i]=trim(str_replace($strneedle[$i],"",$rf));//данные для записи

}
else {$wdata[$i]="";}
echo "<font size='2'>".$wdata[$i]."</font><br>";
}

//проверка на существование аналога в базе
	if ($wdata[2])
	{
					$sql = "SELECT * FROM ".$table_name." WHERE name LIKE \"%".$wdata[2]."%\"" ;
					$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер
					while ($zap = mysql_fetch_array($q))
							{
								$ID=$zap['ID'];
								$name=$zap['name'];
								$orig_name=$zap['orig_name'];
								$pic_name=$zap['pic_name'];
								echo "<br><font color='#FF0000'><h2>ПОХОЖИЕ ФИЛЬМЫ УЖЕ ИМЕЮТСЯ В БАЗЕ</h2></font> ";
								echo "ID - ".$ID."<br>name - ".$name."<br>orig_name - ".$orig_name."<br><br>";
							}
	
	}
	

$_SESSION['year']=$wdata[1];
$_SESSION['name']=$wdata[2];
$_SESSION['orig_name']=$wdata[3];
$_SESSION['genre']=$wdata[4];
$_SESSION['rezh']=$wdata[5];
$_SESSION['cast']=$wdata[6];
$_SESSION['time']=$wdata[7];
$_SESSION['about']=$wdata[8];
$_SESSION['format']=$wdata[9];
$_SESSION['translate']=$wdata[10];
$_SESSION['video']=$wdata[11];
$_SESSION['audio']=$wdata[12];
$_SESSION['value']=$wdata[13];
//выбираем адрес картинки
$rf=trim(chop($readfile));
$picstartstr="poster.jpg\" onclick=\"return hs.expand(this)\" ><img src=\"";//начальная строка для поиска
$picendstr="\" alt=";

$s1=strpos($rf,$picstartstr,0);
if (!$s1) {$picstartstr="poster.jpg|--><img src=\"";$s1=strpos($rf,$picstartstr,0);}
if (!$s1) {$picstartstr="poster01.jpg\" onclick=\"return hs.expand(this)\" ><img src=\"";$s1=strpos($rf,$picstartstr,0);}
if ($s1)
{
$s2=strpos($rf,$picendstr,$s1);
$s=$s2-$s1;
$rf=trim(rawurldecode(substr($rf,$s1,$s)));
}
else {$rf="";}
$picurl=str_replace($picstartstr."/uploads/posts/","",$rf);
$zz=strrpos($picurl,"/");
$picurl="poster2".substr($picurl,$zz);//готовый относительный адрес картинки
$rf="http://www.obnovi.com".str_replace($picstartstr,"",$rf);
echo 'адрес картинки донора - '.$rf.'<br>наш относительный адрес картинки - '.$picurl.'<br>';
$kart=$rf;

$_SESSION['rf']=$rf;
$_SESSION['picurl']=$picurl;

//грабим адрес ссылки letitbit
$rf=trim(chop($readfile));
$s1=strpos($rf,"http://letitbit.net/download/",0);
$s2=strpos($rf,"\" target=\"_blank\"",$s1);
$s=$s2-$s1;
$letiturl=substr($rf,$s1,$s);


//готовим нашу ссылку letitbit
$zz=strrpos($letiturl,"/");
$ourletiturl=substr($letiturl,$zz);
$ourletiturl=str_replace(".html","",$ourletiturl);
$ourletiturl=str_replace("/","",$ourletiturl);
$_SESSION['ourletiturl']=$ourletiturl;
?>
<br><br><br>






        <form method="post" action="http://remote.lib.wm-panel.com/?page=httpftp" enctype="multipart/form-data" target="_blank">
            Исходная ссылка:<br/>
            <input type="edit" name="httpftp_link" style="width:100%;" value="<?php echo $letiturl; ?>" /><br/><br/>
            Наша ссылка в letitbit:<br/>
            <input type="edit" name="httpftp_link_new_name" style="width:100%;" value="<?php echo $ourletiturl; ?>" /><br/><br/>
            <input type="submit" value="Получить ссылку в аккаунте Letitbit"/>
        </form>

<br><br>
<form action="save_grab.php" method="post" name="save_grab">
<input type="submit" name="save" value="записать все в базу сайта">&emsp;
</form>
<div style="position:relative; left:900px;">
<input type="button" name="next" value="следующая запись" onClick="javascript: document.location.href='grab.php';">
<form action="grab.php" method="post" name="clearfile">
<input type="submit" value="очистить файл с урлами">
<input type="hidden" name="clearurl" value="1"> 
</form>
</div>
<?php 
echo "<div style=\"position:absolute; right:10px; top:10px;\"><img src='".$kart."' width='190'>
<div>";
 
Mysql_close($conn); //закрываем соединение

}

?>
</body>
</html>
<?php
}

else
{
		if ($_POST['login']=='grab' & $_POST['pass']=='grab')
												{
												setcookie("pass","enter");
												header ("Location: grab.php");
												}
											 
	?>
    <div align="center">
	Введите логин и пароль для входа:
    <form action="grab.php" method="post" name="password" title="Вход в защищенную зону">
    Логин:  <input type="text" size="20" name="login" title="Логин"><br>
    Пароль: <input type="password" size="20" name="pass" title="Пароль"><br>
    <input type="submit" name="subm_pass" value="Войти">
	</form>
    </div>
<?php    } ?>