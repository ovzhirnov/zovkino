$(document).ready(function(){
	$('.close-it').click(function(){
		$('.fixed-block').slideUp(250, function(){$('.fixed').fadeOut(250)});
		
		return false;
	});

	$('.order-it').click(function(){
		window.location.hash = $(this).attr("href");
		$('.fixed-block').delay(500).slideUp(250, function(){$('.fixed').fadeOut(250)});
		return false;
	});

	$('.order-it2').click(function(){
		window.location.hash = $(this).attr("href");
		$('.fixed-block').delay(500).slideUp(250, function(){$('.fixed').fadeOut(250)});
		return false;
	});
	
	function lastpack(last)
	{
		if (last > 5)
		{
			last--;	
			$('.fixed-block span.q').html(last);
			$('.block5 .remain span').html(last);
			setTimeout(lastpack, 60000, last);
		}
	}
	lastpack(10);
});