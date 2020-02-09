<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php
$graburl=$_GET['ps'];
echo $graburl;
/*
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
*/
?>
</body>
</html>