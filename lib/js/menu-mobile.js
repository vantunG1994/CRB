$(document).ready(function(){
    $('.search-mb').click(function(){
        $(this).parent().toggleClass('wtf');
    });

    $('.host-new').click(function(){
       //$('this').css('background-color',"#fff");
    });

    /*             Menu MB                */
	$('.down-icon').click(function(){
        $(this).parent().find('ul:first').slideToggle('500');

        if($(this).hasClass('down-icon')) {
            $(this).toggleClass('down-icon1');
            $(this).removeClass('down-icon');
        } else {
            $(this).toggleClass('down-icon');
            $(this).removeClass('down-icon1');
        }

    });
    $('#nav_icon').click(function(){
        $('.nav-menu').toggleClass('move-right');
        if($('span.ac').hasClass('fa-bars')) {
            $('span.ac').toggleClass('fa-times');
            $('span.ac').removeClass('fa-bars');
        }
        else {
            $('span.ac').toggleClass('fa-bars');
            $('span.ac').removeClass('fa-times');
        }

    });
});