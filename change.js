but_up=new Image();
but_down=new Image();
href_but_down=new Image();
href_but_up=new Image();
but_down.src="images/mnu_but_down.jpg";
but_up.src="images/mnu_but_up.jpg";
href_but_down.src="images/href_but_down.jpg";
href_but_up.src="images/href_but_up.jpg";

function mOver(num)
	{var obj=document.getElementById(num);
		obj.style.backgroundImage = 'url(' + but_down.src + ')';}

function mOut(num)
	{var obj=document.getElementById(num);
		obj.style.backgroundImage = 'url(' + but_up.src + ')';}

function mOverHref(num)
	{var obj=document.getElementById(num);
		obj.style.backgroundImage = 'url(' + href_but_down.src + ')';}

function mOutHref(num)
	{var obj=document.getElementById(num);
		obj.style.backgroundImage = 'url(' + href_but_up.src + ')';}


function byclose()
	{
	  window.onbeforeunload = function() {
      return "  Очень жаль, что Вы так быстро Нас покидаете, возможно Мы нашли бы чем Вас заинтересовать.\n  Может быть стоит воспользоваться поиском по сайту?\n\n  Вы действительно хотите уйти?";
	  }
	}
	