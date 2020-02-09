<div align="right">
<noindex>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank rel='nofollow'><img src='//counter.yadro.ru/hit?t21.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</noindex>
</div>
<div class="footprint">
<table width="100%">
<tr><td background="images/pres_title.jpg" align="center">
<a href='http://zovkino.ru' title="на главную">* &copy; <?php echo date('Y');?> Новинки кино *</a>
</td>
</tr>
</table>
-- На данном ресурсе расположены только ссылки на скачивание и просмотр фильмов с файлообменников, мы не храним и не распространяем никакие материалы, дабы не нарушать закон о защите авторских прав --<br />
</div>
<table width="100%">
<tr><td background="images/pres_title.jpg" align="center">
<div class="sapa">
							<?php
								if (!strstr ($_SERVER["HTTP_USER_AGENT"],"Yandex") && !strstr ($_SERVER["HTTP_USER_AGENT"],"Google"))
							{			
 
                              global $sape; 
                              echo $sape->return_links();
							}
							?>
</div>
</td>
</tr>
</table>
<?php require('tegi_create.php'); ?>
<div style="display:none;"><a href="sitemap.xml" title="карта сайта">карта сайта</a></div>
<?php 
Mysql_close($conn); 
?>
<div id="ff"></div>
<script type="text/javascript">document.write('<scr'+'ipt type="text/javascript" src="show.js"></scr'+'ipt>');</script>