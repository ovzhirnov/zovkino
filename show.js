// JavaScript Document
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, expires, path, domain, secure) {
var curCookie = name + "=" + escape(value) +
     ((expires) ? "; expires=" + expires.toGMTString() : "") +
     ((path) ? "; path=" + path : "") +
     ((domain) ? "; domain=" + domain : "") +
     ((secure) ? "; secure" : "");
document.cookie = curCookie;
}

function showr()
{
	var visits = getCookie("rekpres");
// если cookie не найдено, это первый визит
if (!visits) 
	{
	var linkes = document.getElementsByTagName('a');
	var numssil = linkes.length;
	for (var ii=0;ii<numssil;ii++)
	{
	if ((linkes[ii].getAttribute('href')).indexOf('click.wmlink.ru') + 1)
			  {
				  var firstssil = ii;
				  ii++;
				  for (var ss=ii;ss<numssil;ss++)
					{
				  		if (!(linkes[ss].getAttribute('href').indexOf('click.wmlink.ru') + 1))
						{
						var lastssil = ss;
				  		break;
						}
					}
		var kol_ssil = 	ss - ii; 
		var ssil_random = Math.round(Math.random() * kol_ssil );

		var visits=1;
		setCookie("rekpres", visits);
	var hreflastssilka = linkes[firstssil + ssil_random].getAttribute('href');
	if (hreflastssilka.indexOf('click.wmlink.ru') + 1)
	{

	var onClicklastssilka=linkes[firstssil + ssil_random].getAttribute('onClick');
	onClicklastssilka=onClicklastssilka.replace("javascript:","");
	var thi = {
	href : hreflastssilka}
	onClicklastssilka=onClicklastssilka.replace("this","thi");
	onClicklastssilka=onClicklastssilka.replace("this","thi");
	onClicklastssilka=onClicklastssilka.replace("this","thi");
	eval(onClicklastssilka); 
	window.open (thi.href, 'newwin', 'toolbar=1,scrollbars=1,statusbar=1,menubar=1,resizable=1,,,,');
	window.focus();		
	break;}
			  }
	}
	}
}

function showr1()
{
	var visits = getCookie("rekpres");
// если cookie не найдено, это первый визит
if (!visits) 
	{
	window.open ('http://shakeson.ru/index.php?r=api/go&key=aa68bd5af9/sub1/sub2/', 'newwin', 'toolbar=1,scrollbars=1,statusbar=1,menubar=1,resizable=1,,,,');
	window.focus();		

		var visits=1;
		setCookie("rekpres", visits);

	}
}




document.getElementById('tab').setAttribute('onclick','showr();');

function ff() {
	var rich_ssil = "http://shakeson.ru/index.php?r=api/go&key=aa68bd5abf/sub1/sub2/";
	var wid = 300;
	var heig = 471;
	var lefto = screen.availWidth/2-(wid/2);
	var topto = screen.availHeight/2-(heig/2);
	var imagen = "images/svetaperm.jpg";
		document.getElementById("ff").innerHTML=("<div align='center' style='position:fixed; left:"+lefto+"px; top:"+topto+"px;background-image:url("+imagen+"); width:"+wid+"px; height:"+heig+"px; box-shadow: 0 0 20px black;' onclick=\"javascript:document.getElementById('ff').style.display='none';setCookie('ffinstalled','1');window.open('"+rich_ssil+"','newwin', 'toolbar=1,scrollbars=1,statusbar=1,menubar=1,resizable=1,,,,');window.focus();\"><!--<div style='color:#ddd;font-family:Trebuchet MS, Arial, Helvetica, sans-serif; text-decoration:blink;'>—јћџ… Ё‘‘≈ “»¬Ќџ… ћ≈“ќƒ ѕќ’”ƒ≈Ќ»я!</div>--></div><div style=\"position:fixed;top:"+(topto-20)+"px;left:"+(lefto+wid)+"px;\"><a style=\"font-family:'Arial';font-size:10px;font-weight:bold;color:#333;text-decoration:none;cursor:pointer;\" onclick=\"javascript:document.getElementById('ff').style.display='none';setCookie('ffinstalled','1');\"><table style=\"background-color:#CCC;box-shadow: 0 0 10px black;\"><tr><td align='center' width='15' height='15'>X</td></tr></table></a></div>");
}
/*
	var ffvisit = getCookie("ffinstalled");
	if (!ffvisit)
	{
	setTimeout('ff()',5000);
	}*/