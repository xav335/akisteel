$(document).foundation();
$(document).ready(function(){
	$('.popup .close').click(function(){
		$(this).parent().parent().addClass('getback');
	});
	$(document).keyup(function(e) {
		if (e.keyCode == 27) { // escape key maps to keycode `27`
			$('.popup .close').parent().parent().addClass('getback');
		}
	});	
});
