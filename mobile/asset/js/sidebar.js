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
                items: 1,

                itemsDesktop : [1000,1], // 2 items between 1000px and 901px

                itemsDesktopSmall : [900,1], // betweem 900px and 601px

                itemsTablet: [700,1], // 2 items between 600 and 480

                itemsMobile : [479,1] , // 1 item between 479 and 0

                navigation: true,

                navigationText: ["<img src='/wp-content/themes/mangvieclam789/img/prev.png'>","<img src='/wp-content/themes/mangvieclam789/img/next.png'>"],

                autoPlay: 5000,

                paginationNumbers:true,

                scrollPerPage : true
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