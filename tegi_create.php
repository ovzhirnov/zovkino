<?php 
//составляем облако тегов
$z = parse_url($_SERVER['REQUEST_URI']);
$zpoisk=$z['path'];
$fil='tegi.php';
if ($_SERVER['HTTP_REFERER'])
{
$stroka='';
if (strstr($_SERVER['HTTP_REFERER'],'google'))//если запрос из гугла
{
$zapros = parse_url($_SERVER['HTTP_REFERER']);
$zapr=$zapros['query'];
parse_str($zapr);
	if (iconv('UTF-8', 'cp1251', $q)<>'')
	{$stroka="<a href='$zpoisk'>".(iconv('UTF-8', 'cp1251', $q))."</a>\n";}
}
if (strstr($_SERVER['HTTP_REFERER'],'rambler.ru'))//если запрос из рамблера
{
$zapros = parse_url($_SERVER['HTTP_REFERER']);
$zapr=$zapros['query'];
parse_str($zapr);
	if (iconv('UTF-8', 'cp1251', $query)<>'')
	{$stroka="<a href='$zpoisk'>".(iconv('UTF-8', 'cp1251', $query))."</a>\n";}
}
if (strstr($_SERVER['HTTP_REFERER'],'yandex.ru'))//если запрос из яшки
{
$zapros = parse_url($_SERVER['HTTP_REFERER']);
$zapr=$zapros['query'];
parse_str($zapr);
	if (iconv('UTF-8', 'cp1251', $text)<>'')
	{$stroka="<a href='$zpoisk'>".(iconv('UTF-8', 'cp1251', $text))."</a>\n";}
}
if ($stroka<>"")
{
$file=fopen($fil,'rb');//открываем файл для сравнения на похожие запросы
if ($file)
{
$readf = '';
while (!feof($file))
{
  $readf .= fread($file, 8192);
} 
	fclose($file);
}
if (!strstr($readf,$stroka))//если не было такие же запросов
{
$fp=fopen($fil, 'a+');//то делаем запись
if ($fp) {$fw=fwrite($fp, $stroka); fclose($fp);}
//ограничиваем количество ссылок в файле
$kolssil=30;//количество ссылок
$li=file($fil);
$kolstr=count($li);
if ($kolstr>$kolssil)
{
for ($ii=($kolstr-$kolssil);$ii<=$kolstr;$ii++)
{
	$newli=$newli.$li[$ii];
}
$fp=fopen($fil,'w+');
if ($fp) {$fw=fwrite($fp,$newli); fclose($fp);}
}
}
}
}
?>