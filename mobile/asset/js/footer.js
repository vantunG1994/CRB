$(document).ready(function(){
		$('.box-title').click(function(){
			$(this).parent().find(".list-item").slideToggle("500");
			if($(this).parent().hasClass('click-ft')) {
				$(this).parent().removeClass('click-ft');
			}
		});
});