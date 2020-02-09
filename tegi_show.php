<div align="center" class="about_films"><br />Нас находят по запросам:</div>
<table align="center" width="800"><tr><td>
<div class="ref_ssil">
<?php
$fil='tegi.php';
$lines=file($fil);
$a=count($lines);
for ($x=0;$x<=($a-1);$x++)
{
$ssil=trim(str_replace("\n","",$lines[$x]));
echo $ssil.'&nbsp;&nbsp;&nbsp;';
}
?>
</div>
</td></tr></table>