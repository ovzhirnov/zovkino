<table width="195" border="0" cellpadding="0" cellspacing="0">
<!--<tr><td class="title_mnu">Реклама</td></tr>
<tr><td><br />
<div id="teaser_7104"><a href="http://globalteaser.ru/">Тизерная сеть GlobalTeaser</a></div>
<script type="text/javascript">document.write('<scr'+'ipt type="text/jav'+'ascript" src="http://globalteaser.ru/show/?block_id=7104&r='+escape(document.referrer)+'&'+Math.round(Math.random()*100000)+'"></scr'+'ipt>');</script>
<br /></td></tr>-->
<tr><td class="title_mnu">НОВИНКИ</td></tr>
<tr><td>
<div align="center" class="novinki">
<?php 
//$data=date("Y");
$data='2014';
$conn = Mysql_connect("localhost", "zovkinor_oleg", "si160111tes") 
or die("Невозможно установить соединение: ". Mysql_error());
$database="zovkinor_films";
$table_name="films";
Mysql_select_db($database); //выбор базы
$sql = "SELECT * FROM ".$table_name." WHERE year=$data";
$q=Mysql_query($sql, $conn);
for ($i=1;$i<=5;$i++)
{
$row=Mysql_fetch_array($q);
if ($row)
{
$ID=$row['ID'];
$year=$row['year'];
$name=$row['name'];
$orig_name=$row['orig_name'];
$picture=$row['picture'];
		echo "<img src='$picture' width='190' title='скачать фильм $name' border='0'><br>
<a href='$ID-download.html' titlte='скачать фильм $name' title='Скачать $name бесплатно'>$name<br>$year</a><br><br>";
}
}

?>
</div>
<br />
<noindex>
<br />
<div class="takrek">
<!--
<script language="JavaScript" src="http://r1.wmlink.ru/?id=310998"></script>
-->
</div>
<br /><br />

</noindex>
</td></tr>
</table>
