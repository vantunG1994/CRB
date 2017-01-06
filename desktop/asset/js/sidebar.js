$(document).ready(function(){
	mycarousel('#sidebar',1,1,1,true,3000);

	mycarousel('#testimonial',4,2,1,true,3000);

	$('.icon-down').click(function(){
		$(this).parent().toggleClass('click');
	});

	  $('[data-toggle="tooltip"]').tooltip(); 
	scrolltotop();

	wdscroll();

    kt_field_add_job();
    kt_field_add_resume();
    kt_field_add_company();
    isset_number("#wpjobus_job_phone");


});
function wdscroll(){
	$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $(".wrap-header").addClass("darkHeader");
    } else {
        $(".wrap-header").removeClass("darkHeader");
    }
});
}
function isset_number($id){
    $($id).blur(function(){
        var number_resume = $("#wpjobus_job_phone").val();
        if(number_resume == "") {
            $("#err_number" ).text('Vui lòng nhập số điện thoại');
                $("#wpjobus_job_phone").focus();  
                return false;
        }
            if(number_resume.charAt(0)!= 0){
               $("#err_number" ).text('Số thứ 1 phải là số 0');
                $("#wpjobus_job_phone").focus();  
                return false;
                
           } 
           if(number_resume.length <10 || number_resume.length >11){
             $("#err_number" ).text('Bạn phải nhập 10 đến 11 số mới là số điên thoại');
                $("#wpjobus_job_phone").focus(); 
                return false;
           } 
           else {
            $("#err_number" ).text('');
                return true;

           }
           
        
    });
}
function kt_sdt()
        {
            alert("aaaaaaaaaa");
            if(frm.userName.value=="")
            {
                $("#err").show();
                $("#err").text("Vui Lòng Nhập số điện thoại");
                frm.userName.focus();
                return false;
            }
            if((frm.userName.value).charAt(0)!=0){
                $("#err").show();
                $("#err").text("Số thứ 1 phải là số 0");
                frm.userName.focus();
                return false;
            }
            if((frm.userName.value).charAt(1)==0){
                $("#err").show();
                $("#err").text("Số thứ 2 không được là số 0");
                frm.userName.focus();
                return false;
            }
            if(isNaN(frm.userName.value))
            {
                $("#err").show();
                $("#err").text("Vui lòng không nhập chữ");
                frm.userName.focus();
                return false;
            }
            if((frm.userName.value).length <10 ||(frm.userName.value).length >11)
            {
                $("#err").show();
                $("#err").text("Bạn phải nhập 10 đến 11 số mới là số điên thoại");
                frm.userName.focus();
                return false;
            }else
            {
                $("#err").hide();
                return true;

            }

        }

function kt_field_add_job(){
    $(".save_add_job").click(function() {
         var name_jobs= $("#information-inputName").val();
        var post_jobs = $("#postContent").val();
        var address_job = $("#wpjobus_job_address").val();
        var email_job = $("#wpjobus_job_email").val();
         var number_resume = $("#wpjobus_job_phone").val();
         var flag = true;
         if(number_resume == "") {
                $("#err_number" ).text('Vui lòng nhập số điện thoại');
                $("#wpjobus_job_phone").focus();  
                flag = false;
            }
            else {
                 $("#err_number" ).text('');
            } 
          

             // email 
            if(email_job == "") {
                $("#err_email" ).text('Email không được để trống và phải đúng định dạng');
                $("#wpjobus_job_email").focus();  
                flag = false;
            }
            else {
                 $("#err_email" ).text('');
            } 
              //dia chi
            if(address_job == ""){
                $("#error_address").text("Vui lòng nhập địa chỉ");
                $("#wpjobus_job_address").focus();
                flag = false;
            }
            else {
                    $("#error_address").hide();
                }  

             // mota
            if(post_jobs == "") {
                $( "#err_postContent" ).text('Vui lòng nhập mô tả công việc');
                $("#postContent").focus();  
                flag = false;
            }
            else {
                 $( "#err_postContent" ).text('');
            }
           

             // name   
            if(name_jobs =="" ){
                $("#userNameError" ).text('Vui lòng nhập tiêu đề tuyển dụng');
                $("#information-inputName").focus();              
                flag = false;
            }
            else{
                    $("#userNameError" ).text('');        
            }
 
           return flag;
          
    });
}

function kt_field_add_resume(){
    $(".save_add_resume").click(function() {
         var name_resume = $("#wpjobus_resume_fullname").val();
        var post_resume = $("#postContent").val();
        var address_resume = $("#wpjobus_resume_address").val();
        var email_resume = $("#wpjobus_resume_email").val();
       var number_resume = $("#wpjobus_job_phone").val();
         var flag = true;

         if(number_resume == "") {
                $("#err_number" ).text('Vui lòng nhập số điện thoại');
                $("#wpjobus_job_phone").focus();  
                flag = false;
            }
            else {
                 $("#err_number" ).text('');
            } 
             // email 
            if(email_resume == "") {
                $("#err_email" ).text('Email không được để trống và phải đúng định dạng');
                $("#wpjobus_resume_email").focus();  
                flag = false;
            }
            else {
                 $("#err_email" ).text('');
            } 
              //dia chi
            if(address_resume == ""){
                $("#error_address").text("Vui lòng nhập địa chỉ");
                $("#wpjobus_job_address").focus();
                flag = false;
            }
            else {
                    $("#error_address").hide();
                }  

             // mota
            if(post_resume == "") {
                $( "#err_postContent" ).text('Vui lòng nhập mô tả');
                $("#postContent").focus();  
                flag = false;
            }
            else {
                 $( "#err_postContent" ).text('');
            }
           

             // name   
            if(name_resume =="" ){
                $("#userNameError" ).text('Vui lòng nhập họ và tên');
                $("#wpjobus_resume_fullname").focus();              
                flag = false;
            }
            else{
                    $("#userNameError" ).text('');        
            }
 
           return flag;
          
    });
}



function kt_field_add_company(){
    $(".save_add_company").click(function() {
         var name_resume = $("#wpjobus_company_fullname").val();
        var post_resume = $("#postContent").val();
        var address_resume = $("#wpjobus_job_address").val();
        var email_resume = $("#wpjobus_job_email").val();
        var number_resume = $("#wpjobus_job_phone").val();
         var flag = true;

           
            
            if(number_resume =="" ){
                $("#err_number" ).text('Vui lòng nhập số điện thoại');
                $("#wpjobus_job_phone").focus();      
                flag = false;
            }
            else{
                    $("#err_number" ).text('');        
            }

             // email 
            if(email_resume == "") {
                $("#err_email" ).text('Email không được để trống và phải đúng định dạng');
                $("#wpjobus_company_email").focus();  
                flag = false;
            }
            else {
                 $("#err_email" ).text('');
            } 
              //dia chi
            if(address_resume == ""){
                $("#error_address").text("Vui lòng nhập địa chỉ");
                $("#wpjobus_job_address").focus();
                flag = false;
            }
            else {
                    $("#error_address").hide();
                }  

             // mota
            if(post_resume == "") {
                $( "#err_postContent" ).text('Vui lòng nhập mô tả');
                $("#postContent").focus();  
                flag = false;
            }
            else {
                 $( "#err_postContent" ).text('');
            }
           
               // name   
            if(name_resume =="" ){
                $("#userNameError" ).text('Vui lòng nhập họ và tên');
                $("#wpjobus_company_fullname").focus();              
                flag = false;
            }
            else{
                    $("#userNameError" ).text('');        
            }
           
 
           return flag;
          
    });
}

function mycarousel(id,itemdestop,itemtable,itemmobile,dots,autoplay){
	try{
		$(id).find(".carousel").each(function(){
			var owl=$(this).find(".carousel-items").owlCarousel({
				items:1,
				loop:true,
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