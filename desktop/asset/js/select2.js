
    jQuery(document).ready(function($) {
        
        jQuery(".user_industy_list").select2({

            placeholder: "Lựa chọn ngành nghề ",
            minimumResultsForSearch: Infinity

        });
        jQuery(".account_type_user_list").select2({
            placeholder: "Bạn là ai ",
            minimumResultsForSearch: Infinity

        });
        jQuery('.select2').select2();

        var select = jQuery(".job_type1").select2({
            placeholder: "Chọn ngành nghề",
            maximumSelectionLength: 2
        });
       

        var select = jQuery(".job_location1").select2({
            placeholder: "Chọn khu vực" ,
            maximumSelectionLength: 2
        });
        var select = jQuery(".job_type").select2({
            placeholder: "Chọn ngành nghề",
             minimumResultsForSearch: Infinity

        });

        var select = jQuery("#job_type").select2({
            placeholder: "Chọn ngành nghề",
              minimumResultsForSearch: Infinity

        });
        var select = jQuery(".job_location").select2({
            placeholder: "Chọn khu vực",
            maximumSelectionLength: 2

        });
        var select = jQuery("#price").select2({
            placeholder: "Mức lương mong muốn",
            maximumSelectionLength: 2

        });
        var select = jQuery(".select2-job").select2({
            placeholder: "Lựa chọn loại công việc",
            maximumSelectionLength: 1
        });
         var select = jQuery(".select2-job").select2({
            placeholder: "Lựa chọn loại công việc",
            maximumSelectionLength: 1

        });

        jQuery(".job_list_industry").select2({
            placeholder: "Ngành nghề ",
            minimumResultsForSearch: Infinity

        });

        jQuery(".job_list_location").select2({

            placeholder: "Khu vực",
            minimumResultsForSearch: Infinity

        });
        jQuery(".resume_list_industry").select2({

            placeholder: "Ngành nghề ",
            minimumResultsForSearch: Infinity
        });



    });
