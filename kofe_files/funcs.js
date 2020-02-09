function changeCountry()
{
	var obj = $('.block5 form select[name="id_country"]');
	var country = $(obj).val();
	switch (parseInt(country))
	{
		case 0:
			$('.block5 .old-price span').text('1980 руб.');
			$('.block5 .new-price').text('990 руб.');
			$('.block5 span.itog#itog').text('290 руб.');
			$('.block5 span.itog#itogo').text('1290 руб.');
			$('.block5 .new-price').css({
				'width': 'auto'
			});
			break;
		case 1:
			$('.block5 .old-price span').text('498 грн.');
			$('.block5 .new-price').text('249 грн.');
			$('.block5 span.itog#itog').text('26 грн.');
			$('.block5 span.itog#itogo').text('275 грн.');
			$('.block5 .new-price').css({
				'width': 'auto'
			});
			break;
		case 3:
			$('.block5 .old-price span').html('580 000 руб.');
			$('.block5 .new-price').text('290 000 руб.');
			$('.block5 span.itog#itog').text('40 000 руб.');
			$('.block5 span.itog#itogo').text('330 000 руб. ');
			$('.block5 .new-price').css({
				'width': '450px'
			});
			break;
		default:
//				alert(country);
			break;
	}
}

$(document).ready(function(){
	$('.block5 form select[name="id_country"]').change(function(){
		changeCountry();
	});
	var user_country = location.search;
	user_country = user_country.match(/c\=([a-z]{2})/i);
	user_country = user_country[1];
	switch (user_country) {
		case "ua":
			$('.block5 form select[name="id_country"] option').attr('selected', '');
			$('.block5 form select[name="id_country"] option[value="1"]').attr('selected', 'selected');
			break;
		case "by":
			$('.block5 form select[name="id_country"] option').attr('selected', '');
			$('.block5 form select[name="id_country"] option[value="3"]').attr('selected', 'selected');
			break;
		default:
			$('.block5 form select[name="id_country"] option').attr('selected', '');
			$('.block5 form select[name="id_country"] option[value="0"]').attr('selected', 'selected');
			break;
	}
	changeCountry();
});
