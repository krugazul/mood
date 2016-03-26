jQuery(document).ready(function($) {
	if ( $("body").hasClass("home") ) {
		$(".menu-item").on('click','a',function(event){
			var url = $(this).attr('href');
			
			$('.menu-item.active').removeClass('active');
			$(this).parent().addClass('active');
			
			if(undefined != url){			
				var url_fragments = url.split('/');
				var sectionSelector = '';
				var idSelector = '#';
				
				if('Home' != $(this).html()){
					if(url_fragments.length > 1){
						sectionSelector = url_fragments[url_fragments.length-2]
					}else{
						sectionSelector = url.replace('#','');
					}
				}else{
					sectionSelector = 'body';
					idSelector = ''
				}
				
				
				if($(idSelector+sectionSelector).length){
					$('html, body').animate({
	                    scrollTop: $(idSelector+sectionSelector).offset().top-180
	                }, 1000);		
					
					event.preventDefault();
				}
			}		
		});
	}
});