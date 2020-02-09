<?php 
//	if (!strstr ($_SERVER["HTTP_USER_AGENT"],"Yandex") && !strstr ($_SERVER["HTTP_USER_AGENT"],"Google"))

    global $sape;
    if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '2c24f9969d3c3948cafd13b00adf5068'); 
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
	$o = array();
    $o['host'] = 'zovkino.ru';
    $sape = new SAPE_client($o);
    unset($o);

?>
<div class="header" >
<a href="http://zovkino.ru" title="Скачать новые фильмы новинки кино в лучшем качестве"><img src="images/header.jpg" alt="Скачать новинки кино новые фильмы в лучшем качестве"></a>
</div>
<div class="head">
<div class="sitename"><a href="http://zovkino.ru" title="Скачать новые фильмы новинки кино в хорошем качестве">Новинки кино</a></div>
<noindex>

<table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="700">
<div style="width:730px;">
<!-- Ячейка примерно 700px -->
<!--<script type="text/javascript">document.write('<scr'+'ipt type="text/javascript" src="chooseus_rek.js"></scr'+'ipt>');</script>				-->
</div>
</td><td align="center">
<div style="margin:0px 5px 0 10px;" class="search">

<br />
Поиск на сайте:
	<form name="searchform" method="post" action="search.php">
    	<input type="text" size="24" name="searchstring" title="введите название фильма полностью, либо частично и мы попытаемся найти схожие по названию">
<input type="image" src="images/lens.png" title="поиск" style="margin:0 0 -5px 0;" />
        <br />введите название фильма
    </form>
</div>
</td>
</tr></table>
</noindex>                            
</div>
