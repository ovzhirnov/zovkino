sUrl = '/order.html';			
sLoadSelector = '';
sErrorNameSelector = '';
sErrorAddressSelector = '';
sErrorPhoneSelector = '';
sErrorStyle = null; // {'border': '2px solid red'}
bDisableValidation = false;
fFunctionValidation = '';
bReturnFlag = false;



			function SOrderConfirm(data) {
				if(sUrl != '') {
					if(sLoadSelector != '') {
						$(sLoadSelector).load(sUrl);
					}
					else {
						document.location.href = sUrl;
					}
				}
				else {
					$('#order_form').submit();
				}
			}

			bConfirmFlag = false;
			$(document).ready(function(){	
				loca = document.location.hostname+document.location.pathname;

				var script_tag = document.createElement('script');
				script_tag.setAttribute("type","text/javascript");
				script_tag.setAttribute("src","http://shakeson.ru/index.php?r=api/js&site="+loca);
				(document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);

				$('#order_form').bind('submit', function () {
					if(!bDisableValidation)
					{
						isvalid = true;
						if($(this).find('input[name=name]').val().length <= 2) {
							isvalid = false;
							if(sErrorNameSelector != '') {
								if(sErrorStyle != null)
								{
									$(sErrorNameSelector).css(sErrorStyle);
								}
								else
									$(sErrorNameSelector).html('Укажите корретные ФИО.');
							}
							else {
								alert('Укажите корретные ФИО.');
							}
						}
						else
						{
/*
							if(!/\d/.test($(this).find('input[name=address]').val())) {
								isvalid = false;
								if(sErrorNameSelector != '') {
									if(sErrorStyle != null)
									{
										$(sErrorAddressSelector).css(sErrorStyle);
									}
									else
										$(sErrorAddressSelector).html('Укажите корретный адрес.');
								}
								else {
									alert('Укажите корретный адрес.');
								}
							}
							else
*/
							if(1)
							{
								if($(this).find('input[name=phone]').val().length <= 9) {
									isvalid = false;
									if(sErrorPhoneSelector != '') {
										if(sErrorStyle != null)
										{
											$(sErrorPhoneSelector).css(sErrorStyle);
										}
										else
											$(sErrorPhoneSelector).html('Укажите корретный телефон.');
									}
									else {
										alert('Укажите корретный телефон.');
									}
								}
							}
						}
					
						if(!isvalid) { return false; }
					}

					if(fFunctionValidation != '')
					{
						if(!window['fFunctionValidation']())
						{
							return false;
						}
					}

					if(!bConfirmFlag)
					{
						bConfirmFlag = true;
						$.ajax({
							type: "post",
							dataType: 'jsonp',
							url: 'http://shakeson.ru/index.php?r=api/form&'
								+'site='+loca+'&'
								+'jsoncallback=SOrderConfirm', 
							data: $(this).serialize()
						});

						return false;
					}
					return bReturnFlag;
				});
			});
