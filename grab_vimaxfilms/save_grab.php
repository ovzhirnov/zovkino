<?php //������ ������ ���� ������
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
or die("���������� ���������� ����������: ". Mysql_error());
$database="kinozov01_films";
$table_name="films";
Mysql_select_db($database); //����� ����
mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");


if ($_SESSION['name'] || $_SESSION['orig_name']) //���� ��� ������ �� ������ ������ � ������
{
//��������� ������ �� ���������� ���������
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

//��������� ������� ������� �� ����������
$name=str_replace("\"","'",$name);
$orig_name=str_replace("\"","'",$orig_name);
$about=str_replace("\"","'",$about);

$link=$rf;//url �������� ��� �����

//������ ��������
$file=@fopen($link,'rb');
if ($file)
{
$readpic = '';
while (!feof($file))
{
  $readpic .= fread($file, 8192);
} 
	fclose($file);
	echo "<font color='#00FF00'>�������� ".$link." �������</font><br>";
}
else {echo "<font color='#FF0000'>�������� �� ����������</font><br>";}


//���������� ��������
$fp=@fopen($picurl,'w');
if ($fp)
{if ($readpic)
{
	$z=fputs($fp,$readpic);
	fclose($fp);
	echo "<font color='#00FF00'>�������� ".$picurl." ��������</font><br>";
}
else
{echo "<font color='#FF0000'>������ ���� �� �����!</font>";}
}
else
{echo "<font color='#FF0000'>������ �� �������!</font>";}

//������� ������ �� ������  ���� ������ � ����

$sql = "INSERT INTO ".$table_name."(year,name,orig_name,genre,rezh,cast,time,about,format,translate,video,audio,value,data,picture,ourletiturl) VALUES 
(\"$year\",\"$name\",\"$orig_name\",\"$genre\",\"$rezh\",\"$cast\",\"$time\",\"$about\",\"$format\",\"$translate\",\"$video\",\"$audio\",\"$value\",\"$data\",\"$picurl\",\"$ourletiturl\")";

$q=Mysql_query($sql, $conn) or die("������ �� ��������!"); //���������� ������ �� ������
if ($q) {echo "<br><font color='#00FF00'>������ � ���� ������� �����������!</font>";}
?>
<div style="position:absolute; left:900px; top:300px;">
<form action="javascript: if (confirm('������� ��������� ������ �� ����?')) {document.location.href='grab.php';}" method="post" name="delete">
<input type="hidden" value="1" name="del">
<input type="submit" value="������� ��������� ������ � ����" name="delete" style="color:#F00;">
</form>
</div>
<?php
}

else 
{
if ($_POST['listurl']) //���� ��� ������ �� ������ ����� �� ���������������
{

$listurl=$_POST['listurl'];//������ �����
$listurl= preg_split ('/\n/', $listurl);

$i=0;
$ss=0;
while ($listurl[$i])
{
if (strstr($listurl[$i],"http://letitbit.net/download/"))//���� ������� ������ �� letitbit
{
$ourletiturl=str_replace("http://letitbit.net/download/","",$listurl[$i]);
}
if (strstr($listurl[$i],"http://vip-file.com/download/"))//���� ������� ������ �� vip-file
{
$ourletiturl=str_replace("http://vip-file.com/download/","",$listurl[$i]);
}

$s=strrpos($ourletiturl,"/");
$ourletiturl=substr($ourletiturl,$s);
$ourletiturl=str_replace(".html","",$ourletiturl);
$ourletiturl=trim($ourletiturl);
$ourletiturl=str_replace("/","",$ourletiturl);

if (strstr($listurl[$i],"http://letitbit.net/download/"))//���� ������� ������ �� letitbit
{
$sql = "UPDATE $table_name SET main_url = '$listurl[$i]' WHERE ourletiturl = '".$ourletiturl."'";//������ �� ������ ���� � ��������������� ������ � ����
}
if (strstr($listurl[$i],"http://vip-file.com/download/"))//���� ������� ������ �� vip-file
{
$sql = "UPDATE $table_name SET sec_url = '$listurl[$i]' WHERE ourletiturl = '".$ourletiturl."'";//������ �� ������ ���� � ��������������� ������ � ����
}

$q=Mysql_query($sql, $conn) or die("������ �� ��������!"); //���������� ������ �� ������
if ($q) {$ss++;}
$i++;
}
echo "����������� - ".$ss." ������� � ����";
}
}
$sql = "ALTER TABLE `films` ORDER BY `ID` DESC";//���������� ���� �� �������� ID
$q=Mysql_query($sql, $conn) or die("������ �� ��������!"); //���������� ������ �� ������
session_destroy();//���������� ���������� ������
Mysql_close($conn); //��������� ����������

?>
<br><input type="button" value="�����" onClick="javascript: document.location.href='grab.php';"> 
</body>
</html>
