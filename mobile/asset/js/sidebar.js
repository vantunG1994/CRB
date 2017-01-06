$(document).ready(function(){
	mycarousel('#sidebar',1,1,1,true,3000);

	mycarousel('#testimonial',4,2,1,true,3000);

	$('.icon-down').click(function(){
		$(this).parent().toggleClass('click');
	});

	  $('[data-toggle="tooltip"]').tooltip(); 
	scrolltotop();
});


function mycarousel(id,itemdestop,itemtable,itemmobile,dots,autoplay){
	try{
		$(id).find(".carousel").each(function(){
			var owl=$(this).find(".carousel-items").owlCarousel({
				items:1,
				loop:false,
				dots:dots,
				autoplay:autoplay,
				smartSpeed:1000,
				responsive:{
			        0:{
			            items:itemmobile,
			        },
			        768:{
			            items:itemtable,
			        },
			        1200:{
			            items:itemdestop,
			        }
			    }
			});
			$(this).find(".carouse-prev").click(function(){
				$(this).parents(".carousel").find(".owl-prev").click();
			});
			$(this).find(".carouse-next").click(function(){
				$(this).parents(".carousel").find(".owl-next").click();
			});
		});
	}
	catch(err){
		console.log(err);
	}
}
function scrolltotop(){
	$(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

}