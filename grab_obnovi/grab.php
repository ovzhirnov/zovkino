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
or die("���������� ���������� ����������: ". Mysql_error());
$database="zovkinor_films";
$table_name="films";
Mysql_select_db($database); //����� ����
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
	if ($fp) {$fw=fwrite($fp,""); fclose($fp); echo "���� � ������ ������!!!<br>";}
	$clearurl=0;
}
if ($_POST['del']=='1')
{
$sql = "SELECT * FROM ".$table_name; //������� SQL ������
$q=Mysql_query($sql, $conn) or die('������ 0 �� ��������!'); //���������� ������ �� ������
$ID=Mysql_result($q,0,0);

$sql = "DELETE FROM ".$table_name." WHERE ID='".$ID."'";
$q=Mysql_query($sql, $conn) or die("������ 1 �� ��������!"); //���������� ������ �� ������
	if ($q)
	{
	echo "<div style='position:absolute; left:940px; top:560px;'><font color='#FF0000'>��������� ������ ������� �������!</font></div>";
	$sql = "ALTER TABLE `films` AUTO_INCREMENT = $ID";
	$q=Mysql_query($sql, $conn) or die("������ 2 �� ��������!"); //���������� ������ �� ������
	}
}

if (!$_POST['graburl'] && !file($file_s_url)<>"")
{ ?>
�������� � ������: http://obnovi.com
<form action="grab.php" method="post" name="graburl">
<br>������� ����� �������� � �������� ��� ���������:<br>
<input type="text" size="60" name="graburl">
<input type="submit" value="�������" name="go">
<input type="reset" value="�������" name="�������">
</form><hr>
<br>������� ������ �� �������������� ��� ������ � ����:
<form action="save_grab.php" method="post" name="fobmennik">
<textarea rows="20" cols="50" name="listurl"></textarea><br>
<input type="submit" value="�������� � ����" name="write">
<input type="reset" value="�������" name="�������">
</form> 
<div style="position:absolute; left:900px; top:580px;">
<form onSubmit="javascript: if (confirm('������� ��������� ������ �� ����?')) {document.location.href='grab.php';}" method="post" name="delete">
<input type="hidden" value="1" name="del">
<input type="submit" value="������� ��������� ������ � ����" name="delete" style="color:#F00;">
</form>
</div>
<?php }
else
{
$graburl=$_POST['graburl'];//url �������� ��� �����

if (!file($file_s_url)<>"") //���� ���� � ������ ������
{//��������� ���� � ����������� ������ � ���������� � ����
$url_file=fopen($graburl,'rb');
if ($url_file)
{
$url_readfile = ''; //���������� ��������
while (!feof($url_file))
{
  $url_readfile .= fread($url_file, 8192);
} 
	fclose($url_file);
}
else {echo "�������� �� ����������<br>";}
$save_url='';
$rf=trim(chop($url_readfile));
$startstr=")</font></a> <a href=\"";//��������� ������ ��� ������
$endstr="\"><font";
while (strstr($rf,$startstr))//��������� ������ ��� ������
{
$s1=strpos($rf,$startstr,0);//��������� ������ ��� ������
$s2=strpos($rf,$endstr,$s1);//�������� ������ ��� ������
$s=$s2-$s1;
$stemp=substr($rf,$s1,$s);
$stemp=str_replace($startstr,'',$stemp);
$save_url .=$stemp."\n";
$rf=substr($rf,($s2+10));
}
$fp=fopen($file_s_url,'w+');
if ($fp) {$fw=fwrite($fp,$save_url); fclose($fp);}
}


//��������� ������ ������ �� ����� � ������ � $link � ������� �� �� �����
$f=file($file_s_url);
$link=trim(str_replace("\n","",$f[0]));
echo "� ������ �������� ".(count($f)-1)." �����<br>";
for ($ii=0;$ii<=(count($f)-1);$ii++)
{
	$newf.=$f[$ii+1];
}
$fp=fopen($file_s_url,'w+');
if ($fp) {$fw=fwrite($fp,$newf); fclose($fp);}

	
$strneedle=array ("","<b>��� ������</b>: ","<b>�����</b>: ","<b>������������ ��������</b>: ","<b>����</b>: ","<b>��������</b>:","<b>� �����</b>: ",
"<b>�����������������</b>: ","� ������</b>: ","<b>��������</b>: ","<b>�������</b>: ","�����:","�����:","<b>������</b>: ");
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
else {echo "�������� �� ����������<br>";}

for ($i=1;$i<=(count($strneedle)-1);$i++)
{
$rf=trim(chop($readfile));
$s1=strpos($rf,$strneedle[$i],0);
	if ($i==1 && !$s1) {$strneedle[$i]="<b>��� ������:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>��� ������: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>��� �������:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==1 && !$s1) {$strneedle[$i]="<b>��� �������</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>�����:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>����������</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==2 && !$s1) {$strneedle[$i]="<b>����������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==3 && !$s1) {$strneedle[$i]="<b>������������ ��������:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==3 && !$s1) {$strneedle[$i]="<b>������������ ��������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==4 && !$s1) {$strneedle[$i]="<b>����:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==5 && !$s1) {$strneedle[$i]="<b>��������:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==5 && !$s1) {$strneedle[$i]="<b>�������</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>� �����: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>� �����:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==6 && !$s1) {$strneedle[$i]="<b>�����</b>:"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==7 && !$s1) {$strneedle[$i]="<b>�����������������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==8 && !$s1) {$strneedle[$i]="� ������:</b> "; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==8 && !$s1) {$strneedle[$i]="<b>� ������: </b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==9 && !$s1) {$strneedle[$i]="<b>��������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==10 && !$s1) {$strneedle[$i]="<b>�������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}
	if ($i==13 && !$s1) {$strneedle[$i]="<b>������:</b>"; $s1=strpos($rf,$strneedle[$i],0);}

if ($s1)
{
$s2=strpos($rf,$strend[$i],$s1);
$s=$s2-$s1;
$rf=substr($rf,$s1,$s);
$wdata[$i]=trim(str_replace($strneedle[$i],"",$rf));//������ ��� ������

}
else {$wdata[$i]="";}
echo "<font size='2'>".$wdata[$i]."</font><br>";
}

//�������� �� ������������� ������� � ����
	if ($wdata[2])
	{
					$sql = "SELECT * FROM ".$table_name." WHERE name LIKE \"%".$wdata[2]."%\"" ;
					$q=Mysql_query($sql, $conn) or die(); //���������� ������ �� ������
					while ($zap = mysql_fetch_array($q))
							{
								$ID=$zap['ID'];
								$name=$zap['name'];
								$orig_name=$zap['orig_name'];
								$pic_name=$zap['pic_name'];
								echo "<br><font color='#FF0000'><h2>������� ������ ��� ������� � ����</h2></font> ";
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
//�������� ����� ��������
$rf=trim(chop($readfile));
$picstartstr="poster.jpg\" onclick=\"return hs.expand(this)\" ><img src=\"";//��������� ������ ��� ������
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
$picurl="poster2".substr($picurl,$zz);//������� ������������� ����� ��������
$rf="http://www.obnovi.com".str_replace($picstartstr,"",$rf);
echo '����� �������� ������ - '.$rf.'<br>��� ������������� ����� �������� - '.$picurl.'<br>';
$kart=$rf;

$_SESSION['rf']=$rf;
$_SESSION['picurl']=$picurl;

//������ ����� ������ letitbit
$rf=trim(chop($readfile));
$s1=strpos($rf,"http://letitbit.net/download/",0);
$s2=strpos($rf,"\" target=\"_blank\"",$s1);
$s=$s2-$s1;
$letiturl=substr($rf,$s1,$s);


//������� ���� ������ letitbit
$zz=strrpos($letiturl,"/");
$ourletiturl=substr($letiturl,$zz);
$ourletiturl=str_replace(".html","",$ourletiturl);
$ourletiturl=str_replace("/","",$ourletiturl);
$_SESSION['ourletiturl']=$ourletiturl;
?>
<br><br><br>






        <form method="post" action="http://remote.lib.wm-panel.com/?page=httpftp" enctype="multipart/form-data" target="_blank">
            �������� ������:<br/>
            <input type="edit" name="httpftp_link" style="width:100%;" value="<?php echo $letiturl; ?>" /><br/><br/>
            ���� ������ � letitbit:<br/>
            <input type="edit" name="httpftp_link_new_name" style="width:100%;" value="<?php echo $ourletiturl; ?>" /><br/><br/>
            <input type="submit" value="�������� ������ � �������� Letitbit"/>
        </form>

<br><br>
<form action="save_grab.php" method="post" name="save_grab">
<input type="submit" name="save" value="�������� ��� � ���� �����">&emsp;
</form>
<div style="position:relative; left:900px;">
<input type="button" name="next" value="��������� ������" onClick="javascript: document.location.href='grab.php';">
<form action="grab.php" method="post" name="clearfile">
<input type="submit" value="�������� ���� � ������">
<input type="hidden" name="clearurl" value="1"> 
</form>
</div>
<?php 
echo "<div style=\"position:absolute; right:10px; top:10px;\"><img src='".$kart."' width='190'>
<div>";
 
Mysql_close($conn); //��������� ����������

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
	������� ����� � ������ ��� �����:
    <form action="grab.php" method="post" name="password" title="���� � ���������� ����">
    �����:  <input type="text" size="20" name="login" title="�����"><br>
    ������: <input type="password" size="20" name="pass" title="������"><br>
    <input type="submit" name="subm_pass" value="�����">
	</form>
    </div>
<?php    } ?>