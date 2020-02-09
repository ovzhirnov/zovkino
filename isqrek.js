// JavaScript Document


//document.write("<div id='icqrek'></div>");
  var bot_173=10;

  function cuoff_173(){
    if(top.self==window){
      js__173GlobalClick=2;
    }
  }

  function cuon_173(){
    if(top.self==window){
      js__173GlobalClick=0;
    }
  }

  function closewin_1731(){
    if(top.self==window){
      js__173GlobalClick=2;
      DivOff_173();
      this.window.focus();
    }
  }

  function DivOff_173()
  {
    okno_173.style.display='none';
  }

function getScrollXY() {
//      if (navigator.appVersion.indexOf('MSIE') != -1)
  var scrOfX = 0, scrOfY = 0;
  if( typeof( window.pageYOffset ) == 'number' ) {
    //Netscape compliant
    scrOfY = window.pageYOffset;
    scrOfX = window.pageXOffset;
  } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
    //DOM compliant
    scrOfY = document.body.scrollTop;
    scrOfX = document.body.scrollLeft;
  } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
    //IE6 standards compliant mode
    scrOfY = document.documentElement.scrollTop;
    scrOfX = document.documentElement.scrollLeft;
  }
  return [scrOfX, scrOfY];
}

function get_wh()
{var frameHeight=640;
if (self.innerHeight)
    frameHeight = self.innerHeight;
else if (document.documentElement && document.documentElement.clientHeight)
    frameHeight = document.documentElement.clientHeight;
else if (document.body)
    frameHeight = document.body.clientHeight;
return frameHeight;
}

  function vspl_173(){
    if ((!document.all && !document.getElementById))
      return;

    var wh=document.body.clientHeight;

    bot_173=bot_173+4;
    if ((navigator.appName == 'Opera') || (navigator.appName == 'Netscape'))
      okno_173.style.top = get_wh() - bot_173 +'px';
    else
      okno_173.style.top = get_wh() + getScrollXY()[1] - bot_173 +'px';


//    okno_173.style.bottom=bot_173;

    if (bot_173<250) {
      setTimeout(function (){vspl_173();},5);
    }

    if (bot_173>0) {
//      okno_173.style.bottom="0px";
    }
  }

  function resize() {
     if (navigator.appVersion.indexOf('MSIE') != -1)
        okno_173.style.top= get_wh() + getScrollXY()[1] - 263 +'px';
  }

  function scroll_icq() {
     if (navigator.appVersion.indexOf('MSIE') != -1)
        okno_173.style.top= get_wh() + getScrollXY()[1] - 263 +'px';
  }

function getCookie(name) {
var dc = document.cookie;
var prefix = name + "=";
var begin = dc.indexOf("; " + prefix);
if (begin == -1) {
    begin = dc.indexOf(prefix);
    if (begin != 0) return null;
} else
     begin += 2;
var end = document.cookie.indexOf(";", begin);
if (end == -1)
    end = dc.length;
return unescape(dc.substring(begin + prefix.length, end));
}

function setCookie(name, value, expires, path, domain, secure) {
var curCookie = name + "=" + escape(value) +
     ((expires) ? "; expires=" + expires.toGMTString() : "") +
     ((path) ? "; path=" + path : "") +
     ((domain) ? "; domain=" + domain : "") +
     ((secure) ? "; secure" : "");
document.cookie = curCookie;
}


function Run() {
	
	var visits = getCookie("rekpres");
// если cookie не найдено, это первый визит
	if (!visits) 
	{
	var visits=1;
	setCookie("rekpres", visits);

/*
document.getElementById("icqrek").innerHTML = "<table><tr><td><div style=\"position:absolute;display:none;background-color: #4444FF;width:306px;height:270px;right:0px;bottom:0px;z-index:999999\" id=\"icqrek_173\">"
+"<div style=\"position:absolute;margin-top:0px;margin-left:290px;\"><a style=\"font-family:'Arial';font-size:10px;vertical-align:top;font-weight:bold;color:#6A6666;text-decoration:none;cursor:pointer;\" onclick=\"closewin_1731()\">X</a></div>"
+"<div id='isqrek'><script type='text/javascript' charset='UTF-8' src='http://z820.takru.com/in.php?id=827413'></script></div>"
+"</div></td></tr></table>";
*/
  var ns6_173 = document.getElementById && !document.all;
  var ie_173 = document.all;

  okno_173=document.getElementById("icqrek_173");
  okno_173.style.display="block";

  window.onscroll = scroll_icq ;
  window.onresize = resize ;

  vspl_173();

  if (ns6_173){
    okno_173.style.position="fixed";
  }
	}

}
//setTimeout('Run()',0);

