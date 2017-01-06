$(document).ready(function()
{
    function activeTab(obj)
    {
        $('.tab-wrapper ul li').removeClass('active');
        $(obj).addClass('active');
        var id = $(obj).find('a').attr('href');
        $('.tab-item').hide();
        $(id) .show();
    }
    $('.tab li').click(function(){
        activeTab(this);
        return false;
    });
    activeTab($('.tab li:first-child'));
});
$(document).ready(function()
{
    function activeTablist(obj)
    {
        $('.tab-wrapper-list ul li').removeClass('active');
        $(obj).addClass('active');
        var id = $(obj).find('a').attr('href');
        $('.index_listting').hide();
        $(id) .show();
    }
    $('.tab-list li').click(function(){
        activeTablist(this);
        return false;
    });
    activeTablist($('.tab-list li:first-child'));
});