<html>
<head>
<title>Фильмы</title>

<script language="javascript">
// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options) {
  options = options || {};
  var expires = options.expires;
  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires*1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }
  value = encodeURIComponent(value);
  var updatedCookie = name + "=" + value;
  for(var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];   
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
     }
  }
  document.cookie = updatedCookie;
}

function showr()
{
//	document.write('hello');
	var visits = getCookie("rekpres");
// если cookie не найдено, это первый визит
if (!visits) 
	{
	var linkes = document.getElementsByTagName('a');
	var numssil = linkes.length;
//	document.write(numssil);
	for (var ii=0;ii<numssil;ii++)
	{
	if (linkes[ii].getAttribute('href').indexOf('zirigara.ru/go.php') + 1)
			  {
				  var firstssil = ii;
				  ii++;
				  for (var ss=ii;ss<numssil;ss++)
					{
				  		if (!(linkes[ss].getAttribute('href').indexOf('zirigara.ru/go.php') + 1))
						{
						var lastssil = ss;
				  		break;
						}
					}
					document.write(firstssil+"..."+lastssil);
					
					
		var kol_ssil = 	ss - ii; 
		var ssil_random = Math.round(Math.random() * kol_ssil );

		var visits=1;
		setCookie("rekpres", visits);
		
		var hreflastssilka = linkes[firstssil + ssil_random].getAttribute('href');
		if (hreflastssilka.indexOf('zirigara.ru/go.php') + 1)
		  {
			window.open (hreflastssilka, 'newwin', 'toolbar=1,scrollbars=1,statusbar=1,menubar=1,resizable=1,,,,');
			window.focus();				
		   break;
		  }
				}
	}
	}

}
</script>

<script language="javascript">
function ssil1()
{
var sid=document.getElementsByTagName('iframe');
var cont=sid.length;
document.write(cont);
	
}



function ssil()
{
//	var cont=window.frames[0].src;
//var sid=document.getElementsByTagName('iframe');
// var cont=sid[0].contentDocument.src;
//var cont=sid[0].src;
//var fr = document.getElementsByTagName('iframe');
//var sss = document.getElementsByName(sid).src;
//document.write(fr[0].src);
/*var frnum=fr[0].getElementsByTagName('a').length;
document.write(fr[0].getElementsByTagName('a')[0].getAttribute('href') + "<br>");
*/
var links=document.getElementsByTagName('a');
var numssil = links.length;
//document.write(numssil);

for (var numlastssil=0;numlastssil<numssil;numlastssil++)
{
	if (links[numlastssil].getAttribute('href').indexOf('zirigara.ru/go.php') + 1)
	{break;}
}

var classlastssilka=links[numlastssil].getAttribute('class'); 
var coordslastssilka=links[numlastssil].getAttribute('coord'); 
var dirlastssilka=links[numlastssil].getAttribute('dir'); 
var hreflastssilka=links[numlastssil].getAttribute('href');
var hreflanglastssilka=links[numlastssil].getAttribute('hreflang');
var idlastssilka=links[numlastssil].getAttribute('id');
var namelastssilka=links[numlastssil].getAttribute('name');
var rellastssilka=links[numlastssil].getAttribute('rel');
var revlastssilka=links[numlastssil].getAttribute('rev');
var shapelastssilka=links[numlastssil].getAttribute('shape');
var stylelastssilka=links[numlastssil].getAttribute('style');
var tabindexlastssilka=links[numlastssil].getAttribute('tabindex');
var accesskeylastssilka=links[numlastssil].getAttribute('accesskey');
var targetlastssilka=links[numlastssil].getAttribute('target');
var titlelastssilka=links[numlastssil].getAttribute('title');
var onClicklastssilka=links[numlastssil].getAttribute('onClick');
var accesskeylastssilka=links[numlastssil].getAttribute('accesskey');
var icerepeatinglastssilka=links[numlastssil].getAttribute('ice:repeating');
var langlastssilka=links[numlastssil].getAttribute('lang');
var onBlurlastssilka= links[numlastssil].getAttribute('onBlur');
var onFocuslastssilka= links[numlastssil].getAttribute('onFocus');
var onMouseDownlastssilka= links[numlastssil].getAttribute('onMouseDown');
var onMouseMovelastssilka= links[numlastssil].getAttribute('onMouseMove');
var onMouseOutlastssilka= links[numlastssil].getAttribute('onMouseOut');
var onMouseOverlastssilka= links[numlastssil].getAttribute('onMouseOver');
var sprychooselastssilka= links[numlastssil].getAttribute('spry:choose');
var sprycontentlastssilka= links[numlastssil].getAttribute('spry:content');
var sprydefaultlastssilka= links[numlastssil].getAttribute('spry:default');
var sprydetailregionlastssilka= links[numlastssil].getAttribute('spry:detailregion');
var spryevenlastssilka= links[numlastssil].getAttribute('spry:even');
var spryhoverlastssilka= links[numlastssil].getAttribute('spry:hover');
var spryiflastssilka= links[numlastssil].getAttribute('spry:if');
var spryoddlastssilka= links[numlastssil].getAttribute('spry:odd');
var spryregionlastssilka=links[numlastssil].getAttribute('spry:region');
var spryrepeatlastssilka= links[numlastssil].getAttribute('spry:repeat');
var spryrepeatchildrenlastssilka= links[numlastssil].getAttribute('spry:repeatchildren');
var spryselectlastssilka= links[numlastssil].getAttribute('spry:select');
var spryselectedlastssilka= links[numlastssil].getAttribute('spry:selected');
var spryselectgrouplastssilka= links[numlastssil].getAttribute('spry:selectgroup');
var sprysetrowlastssilka= links[numlastssil].getAttribute('spry:setrow');
var sprysetrownumberlastssilka= links[numlastssil].getAttribute('spry:setrownumber');
var sprysortlastssilka= links[numlastssil].getAttribute('spry:sort');
var sprystatelastssilka= links[numlastssil].getAttribute('spry:state');
var sprytestlastssilka= links[numlastssil].getAttribute('spry:test');
var sprywhenlastssilka=links[numlastssil].getAttribute('spry:when');



document.write(" classlastssilka= " +  classlastssilka+ "<br>");
document.write(" coordslastssilka= " +  coordslastssilka+ "<br>");
document.write(" dirlastssilka= " +  dirlastssilka+ "<br>");
document.write(" hreflastssilka= " +  hreflastssilka+ "<br>");
document.write(" hreflanglastssilka= " +  hreflanglastssilka+ "<br>");
document.write(" idlastssilka= " +  idlastssilka+ "<br>");
document.write(" namelastssilka= " +  namelastssilka+ "<br>");
document.write(" rellastssilka= " +  rellastssilka+ "<br>");
document.write(" revlastssilka= " +  revlastssilka+ "<br>");
document.write(" shapelastssilka= " +  shapelastssilka+ "<br>");
document.write(" stylelastssilka= " +  stylelastssilka+ "<br>");
document.write(" tabindexlastssilka= " +  tabindexlastssilka+ "<br>");
document.write(" accesskeylastssilka= " +  accesskeylastssilka+ "<br>");
document.write(" targetlastssilka= " +  targetlastssilka+ "<br>");
document.write(" titlelastssilka= " +  titlelastssilka+ "<br>");
document.write(" onClicklastssilka= " +  onClicklastssilka+ "<br>");
document.write("accesskeylastssilka= " +  accesskeylastssilka+ "<br>");
document.write("icerepeatinglastssilka= " +  icerepeatinglastssilka+ "<br>");
document.write("langlastssilka= " +  langlastssilka+ "<br>");
document.write("onBlurlastssilka= " +  onBlurlastssilka+ "<br>");
document.write("onFocuslastssilka=  " +  onFocuslastssilka+ "<br>");
document.write("onMouseDownlastssilka= " +  onMouseDownlastssilka+ "<br>");
document.write("onMouseMovelastssilka=  " +  onMouseMovelastssilka+ "<br>");
document.write("onMouseOutlastssilka=  " +  onMouseOutlastssilka+ "<br>");
document.write("onMouseOverlastssilka= " +  onMouseOverlastssilka+ "<br>");
document.write("sprychooselastssilka= " +  sprychooselastssilka+ "<br>");
document.write("sprycontentlastssilka=  " +  sprycontentlastssilka+ "<br>");
document.write("sprydefaultlastssilka= " +  sprydefaultlastssilka+ "<br>");
document.write("sprydetailregionlastssilka=  " + sprydetailregionlastssilka + "<br>");
document.write("spryevenlastssilka=  " +  spryevenlastssilka+ "<br>");
document.write("spryhoverlastssilka=  " +  spryhoverlastssilka+ "<br>");
document.write("spryiflastssilka= " +  spryiflastssilka+ "<br>");
document.write("spryoddlastssilka=  " + spryoddlastssilka + "<br>");
document.write("spryregionlastssilka= " +  spryregionlastssilka+ "<br>");
document.write("spryrepeatlastssilka=  " +  spryrepeatlastssilka+ "<br>");
document.write("spryrepeatchildrenlastssilka=  " + spryrepeatchildrenlastssilka + "<br>");
document.write("spryselectlastssilka= " +  spryselectlastssilka+ "<br>");
document.write("spryselectedlastssilka=  " + spryselectedlastssilka + "<br>");
document.write("spryselectgrouplastssilka=  " + spryselectgrouplastssilka+ "<br>");
document.write("sprysetrowlastssilka=  " +  sprysetrowlastssilka+ "<br>");
document.write("sprysetrownumberlastssilka=  " +  sprysetrownumberlastssilka+ "<br>");
document.write("sprysortlastssilka= " +  sprysortlastssilka+ "<br>");
document.write("sprystatelastssilka=  " + sprystatelastssilka + "<br>");
document.write("sprytestlastssilka=  " +  sprytestlastssilka+ "<br>");
document.write("sprywhenlastssilka= " + sprywhenlastssilka+ "<br>");

}
</script>



</head>


<body>
<span class="tid4727_3e4ad6b1f0bf1797747ba729d7150ee4"></span>
<script type="text/javascript">
(function() {
var kdm = document.createElement('script'); kdm.type = "text/javascript"; kdm.async = true;
kdm.src = "http://vogotita.com/6be4216b56182ce725b423cc5defac59.js";
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(kdm, s);
})();
</script>

<br><br>
<a href="http://vishey.ru">vishey</a><br><br>
<script language="javascript">
document.write("<table border='2' onClick='showr();'><tr><td width='200' height='300'>ssilka</td></tr></table>");
</script>
<input type="button" value="свойства ссылки" onClick="ssil();">


 
</body> 
</html>