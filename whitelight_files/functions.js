$(document).ready(function(){
	$('.close').click(function(){
		$('.footer-panel').slideUp(250, function(){$('.footer-panel .holder').fadeOut(250)});
		
		return false;
	});
	
	$('.footer-panel .link').click(function(){
		$('html, body').animate({scrollTop:$('#order').offset().top}, 1000);
		$('.footer-panel').slideUp(250, function(){$('.footer-panel .holder').fadeOut(250)});
		
		return false;
	});	
});