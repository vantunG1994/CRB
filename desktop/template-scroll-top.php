<style>
#save_post{
cursor: pointer;
position: fixed;
bottom:20px;
right: 20px;
color: white;
height: 50px;
border-radius: 50%;
background: #484848;
}
</style>
<a id="back-to-top" style="bottom: 80px !important;" title="Lên Đầu Trang"  class="btn btn-lg back-to-top" role="button"  data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-up"></i></a>
<?php
if ( is_user_logged_in() ) {
?>
<a id="save_post" class="btn btn-lg back-to-top"  href="<?php echo home_url();?>/tin-da-luu" title="Tin Đã Lưu" role="button"  data-toggle="tooltip" data-placement="left"><i class="fa fa-floppy-o"></i></a>
<?php
}
?>