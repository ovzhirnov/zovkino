<?php 
//входящие: $fo-файлообменник, $id-номер строки базы
$fo=$_GET['fo'];
$id=$_GET['id'];
switch ($fo)
{case 'letitbit': $col='main_url'; break;
case 'vip-file': $col='sec_url'; break;}
$conn = Mysql_connect("localhost", "zovkinor_oleg", "si160111tes") 
or die("Невозможно установить соединение: ". Mysql_error());
$database="zovkinor_films";
$table_name="films";
Mysql_select_db($database); //выбор базы
$sql = "SELECT * FROM ".$table_name." WHERE ID='".$id."' LIMIT 1";
$q=Mysql_query($sql, $conn);
$row=Mysql_fetch_array($q);
$url=rtrim($row[$col]);
$orig_name=$row['orig_name'];
$value=$row['value'];
$d_load=$row['d_load']; //считываем счетчик скачиваний
$d_load++; 
$sql ="UPDATE $table_name SET d_load = '$d_load' WHERE ID = '".$id."'";
$q=Mysql_query($sql, $conn) or die("Запрос не выполнен!"); //отправляем запрос на сервер
Mysql_close($conn); //закрываем соединение
if ($url<>'')
{header ("Location: $url");}
//{header ("Location:"."http://loadmoney.ru/get_file?sid=10082&url=".base64_encode($url)."&name=".base64_encode($orig_name)."&type=".base64_encode('video')."&size=".base64_encode($value));}
//{header ("Location:"."http://dwn-loader.ru/".base64_encode(urlencode("2666").";".urlencode($url).";name=".urlencode($orig_name).";size=" .urlencode($value).";type=".urlencode('video')));}
//{header ("Location:"."http://getfile.eu/get_file/?sid=729&url=".urlencode($url)."&name=".urlencode($orig_name)."&type=".urlencode('video')."&size=".urlencode($value));}
else {echo "<div align='center'><font color='#990000' size='+2'> Извините, на данный момент ссылка не доступна!<br>В ближайшее время мы постараемся исправить ситуацию!</font></div>";}
?>