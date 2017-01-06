var cdn_host = "<?php echo $cdn_host; ?>";
$(document).ready(function() {
    $('#nav_icon').click(function() {
        var height = $(window).height() - ($('#wapper-menu').height() - 1);
        $('.nav-menu').css({
            'max-height': height
        });
        if ($('.nav-menu').hasClass('move-right')) {
            $('body').removeClass('body-fixed');
            $(this).find('.fa').removeClass('fa-times');
            $(this).find('.fa').addClass('fa-bars');
            $('.nav-menu').removeClass('move-right');
            $('.overlay-white').hide();
        } else {
            $('body').addClass('body-fixed');
            $(this).find('.fa').removeClass('fa-bars');
            $(this).find('.fa').addClass('fa-times');
            $('.nav-menu').addClass('move-right');
            $('.overlay-white').show();
        }
    });
    $('.overlay-white').click(function(event) {
        $(this).hide();
        $('.nav-menu').removeClass('move-right');
        $('#nav_icon').find('.fa').removeClass('fa-times');
        $('#nav_icon').find('.fa').addClass('fa-bars');
        $('body').removeClass('body-fixed');
    });
    $('#div_admin').click(function() {
        $('.user_left').animate({
            height: 'toggle'
        }, 500);
    });
    $('.list-group-item').click(function() {
        $(this).parent().find("ul").animate({
            height: 'toggle'
        });
    });
    //$('li.item-child').append('<span class="down-icon"></span>');
    $(".down-icon").click(function() {
        $(this).parent().find("ul:first").slideToggle("500");
        if ($(this).hasClass('down-icon')) {
            $(this).addClass('down-icon1').removeClass('down-icon');
        } else {
            $(this).addClass('down-icon').removeClass('down-icon1');
        }
    });
    $('a.login-window').click(function() {
        var loginBox = $(this).attr('href');
        $(loginBox).fadeIn(300);
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;
        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        return false;
    });
    var topNewsButton = $('#topNewsButton'),
        topNewsSection = $('#topnews_mobile'),
        topNewsContent = $('.topnews_content'),
        marked = 0,
        ajaxLoaded = 0,
        html = '',
        topNewsButtonPosition = $('#topNewsButton').offset().left;
    topNewsButton.click(function(event) {
        if (topNewsButton.hasClass('topnews_active')) {
            topNewsButton.removeClass('topnews_active');
            topNewsSection.removeClass('active_topnews');
            $('#wapper-menu').removeClass('caribe-box-shadow-none');
            $('#button_show_hot_news').removeClass('activated');
            $('#wapper-menu').removeClass('caribe-z-index-9b1');
            topNewsSection.removeClass('caribe-z-index-9b');
        } else {
            $("#save-section").hide();
            topNewsButton.addClass('topnews_active');
            topNewsSection.addClass('active_topnews');
            $('#wapper-menu').addClass('caribe-box-shadow-none');
            $('#button_show_hot_news').addClass('activated');
            $('#wapper-menu').addClass('caribe-z-index-9b1');
            topNewsSection.addClass('caribe-z-index-9b');
            topNewsSection.css('left', topNewsButtonPosition - 250);
        }
    });
    $('body').not('#topNewsButton*, #topnews_mobile*').click(function(e) {
        topNewsButton.removeClass('topnews_active');
        topNewsSection.removeClass('active_topnews');
        $('#wapper-menu').removeClass('caribe-box-shadow-none');
        $('#button_show_hot_news').removeClass('activated');
        $('#wapper-menu').removeClass('caribe-z-index-9b1');
        topNewsSection.removeClass('caribe-z-index-9b');
    });
    $('#topNewsButton*, #topnews_mobile*').click(function(event) {
        event.stopPropagation();
    });
    $("#save-section-button").click(function() {
        $("#save-section").slideToggle('fast');
    });
    $('#jobs_save_body').on('click', '.delete_jobs_save', function() {
        var short_slug_delete = $(this).attr("data-delete");
        $.ajax({
            url: "/ajax/addpost",
            type: 'POST',
            dataType: 'text',
            data: {
                short_slug: short_slug_delete,
                post_info: ''
            },
            success: function(result) {
                $("#item-save-jobs_" + short_slug_delete).remove();
                if (short_slug_delete)
                    if (typeof jobs_short_slug_save != 'undefined' && jobs_short_slug_save == short_slug_delete) {
                        jobs_saved = '0';
                        $("#button_save_job").empty().html('<span class="fa fa-floppy-o"></span> LĂ†Â°u tin nĂƒ y');
                        $("#button_save_job").removeClass('post-saved');
                    }
                if ($('.delete_jobs_save').length == 0) {
                    $("#empty_save_jobs").show();
                }
            }
        });
    });
    $("#button_save_job").click(function() {
        if (jobs_saved != '1' && typeof jobs_short_slug_save != 'undefined' && typeof jobs_info_save != 'undefined' && jobs_short_slug_save != '' && jobs_info_save != '') {
            var info_jobs_save = $.parseJSON(jobs_info_save);
            $.ajax({
                url: "/ajax/addpost",
                type: 'POST',
                dataType: 'text',
                data: {
                    short_slug: jobs_short_slug_save,
                    post_info: jobs_info_save
                },
                success: function(result) {
                    $("#button_save_job").empty().html('<span class="fa fa-download"></span> Ă„ÂĂƒÂ£ lĂ†Â°u');
                    $("#button_save_job").addClass('post-saved');
                    var html_save_post_add = '';
                    html_save_post_add += '<div class="item-save-jobs" id="item-save-jobs_' + jobs_short_slug_save + '"><a href="' + info_jobs_save.link + '" class="save-post-link">';
                    html_save_post_add += info_jobs_save.title + '</a><a data-delete="' + jobs_short_slug_save + '" href="javascript:void(0)" rel="nofollow" class="del-post-link delete_jobs_save">';
                    html_save_post_add += '<span class="fa fa-trash-o"></span></a></div>';
                    $("#jobs_save_body").append(html_save_post_add);
                    jobs_saved = '1';
                    $("#empty_save_jobs").hide();
                }
            });
        }
    });
    $('.btn-back-browser').click(function() {
        parent.history.back();
        return false;
    });
    $('div#mask').click(function() {
        $('.login-popup').fadeOut(300, function() {
            $('#mask').remove();
        });
        $('#mask').fadeOut(300, function() {
            $('#mask').remove();
        });
        return false;
    });

    function random(owlSelector) {
        owlSelector.children().sort(function() {
            return Math.round(Math.random()) - 0.5;
        }).each(function() {
            $(this).appendTo(owlSelector);
        });
    }
});
$(document).ready(function() {
    var menu_h = $('#wapper-menu').outerHeight();
    var footer_h = $('#wapper-footer').outerHeight();
    var screen_h = $(window).height();
    $('#container').css('min-height', screen_h - footer_h - menu_h - 50);
    var cache_tooltip = {};
    var time_delay = 470;
    var tooltipTimeoutID = false;
    var button_save_jobs_left = $("#save-section-button").offset().left;
    $("#save-section").css('left', button_save_jobs_left);
    $('.showtip').tooltip({
        create: function(event, ui) {
            $(this).mouseout(function(event) {
                clearTimeout(tooltipTimeoutID);
            });
        },
        track: true,
        content: function(callback) {
            var flag = false;
            var idx = $(this).attr('id');
            if (Object.keys(cache_tooltip).length > 0) {
                $.each(cache_tooltip, function(key, value) {
                    if (key == idx) {
                        callback(value);
                        flag = false;
                        return false;
                    } else {
                        flag = true;
                    }
                });
            } else {
                flag = true;
            }
            if (flag == true) {
                time_delay = 0;
                tooltipTimeoutID = setTimeout(function() {
                    $.get('ajax/tooltip', {
                        id: idx
                    }, function(data) {
                        cache_tooltip[idx] = data;
                        callback(data);
                    });
                }, 400)
            } else {
                time_delay = 470;
            }
        },
        show: {
            delay: time_delay
        },
    });
});

function isEmpty(el, text) {
    var str = el.value;
    if (str != "")
        while (str.charAt(0) == " ") str = str.substr(1, str.length);
    if (str != "") return false;
    if (typeof(text) != 'undefined') alert(text);
    el.value = '';
    el.focus();
    return true;
}

function isNumber(el, text) {
    var str = "0123456789";
    for (var j = 0; j < el.value.length; j++) {
        if (str.indexOf(el.value.charAt(j)) == -1) {
            if (typeof(text) != 'undefined') alert(text);
            el.value = '';
            el.focus();
            return false;
        }
    }
    return true;
}

function CheckPhone(phone) {
    var str = "0123456789. ()-";
    var result = true;
    for (var j = 0; j < phone.length; j++) {
        if (str.indexOf(phone.charAt(j)) == -1) {
            result = false;
            break;
        }
    }
    if (phone.length < 7) result = false;
    return result;
}

function isPhone(el, text) {
    var str = "0123456789. ()-";
    var result = true;
    for (var j = 0; j < el.value.length; j++) {
        if (str.indexOf(el.value.charAt(j)) == -1) {
            result = false;
            break;
        }
    }
    if (el.value.length < 7) result = false;
    if (!result) {
        el.focus();
        if (typeof(text) != 'undefined') alert(text);
    }
    return result;
}

function check_email(email) {
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
}

function isEmail(el, text) {
    emailRegExp = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    if (!emailRegExp.test(el.value)) {
        if (typeof(text) != 'undefined') alert(text);
        el.focus();
        return false;
    }
    return true;
}

function showtime(id, lang) {
    var navName = navigator.appName;
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = ((hours > 12) ? hours - 12 : hours);
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    timeValue += (hours >= 12) ? " PM, " : " AM, ";
    if (typeof(lang) != 'undefined' && lang == 'vi') {
        switch (now.getDay()) {
            case 1:
                timeValue += 'ChĂ¡Â»Â§ NhĂ¡ÂºÂ­t';
                break;
            case 2:
                timeValue += 'ThĂ¡Â»Â© Hai';
                break;
            case 3:
                timeValue += 'ThĂ¡Â»Â© Ba';
                break;
            case 4:
                timeValue += 'ThĂ¡Â»Â© TĂ†Â°';
                break;
            case 5:
                timeValue += 'ThĂ¡Â»Â© NĂ„Æ’m';
                break;
            case 6:
                timeValue += 'ThĂ¡Â»Â© SĂƒÂ¡u';
                break;
            case 7:
                timeValue += 'ThĂ¡Â»Â© BĂ¡ÂºÂ£y';
                break;
        }
        timeValue += ' &nbsp;' + now.getDate();
        if (now.getMonth() > 9) timeValue += ' - ' + now.getMonth();
        else timeValue += ' - 0' + now.getMonth();
        timeValue += ' - ' + (now.getYear() + 1900);
    } else {
        switch (now.getDay()) {
            case 1:
                timeValue += 'Sunday';
                break;
            case 2:
                timeValue += 'Monday';
                break;
            case 3:
                timeValue += 'Tuesday';
                break;
            case 4:
                timeValue += 'Wednesday';
                break;
            case 5:
                timeValue += 'Thursday';
                break;
            case 6:
                timeValue += 'Friday';
                break;
            case 7:
                timeValue += 'Saturday';
                break;
        }
        if (now.getMonth() > 9) timeValue += ' &nbsp;' + now.getMonth();
        else timeValue += ' &nbsp;0' + now.getMonth();
        timeValue += ' - ' + now.getDate();
        if (navName == 'Netscape') timeValue += ' - ' + (now.getYear() + 1900);
        else
            timeValue += ' - ' + (now.getYear());
    }
    document.getElementById(id).innerHTML = timeValue;
    timerID = setTimeout("showtime('" + id + "','" + lang + "')", 1000);
}(function($) {
    "use strict";
    $(document).ready(function() {
        if (jQuery().flexslider) {
            $('#home-flexslider .flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 7000,
                animationSpeed: 1500,
                directionNav: true,
                controlNav: false,
                keyboardNav: true,
                start: function(slider) {
                    slider.removeClass('loading');
                }
            });
            $('.slider-wrapper , .listing-slider').hover(function() {
                var mobile = $('body').hasClass('probably-mobile');
                if (!mobile) {
                    $('.flex-direction-nav').stop(true, true).fadeIn('slow');
                }
            }, function() {
                $('.flex-direction-nav').stop(true, true).fadeOut('slow');
            });
            $('#property-detail-flexslider .flexslider').flexslider({
                animation: "slide",
                directionNav: true,
                animationLoop: true,
                controlNav: "thumbnails",
                start: function(slider) {
                    slider.resize();
                }
            });
            $('.listing-slider ').flexslider({
                animation: "slide"
            });
            $('#property-carousel-two').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 113,
                itemMargin: 10,
                asNavFor: '#property-slider-two'
            });
            $('#property-slider-two').flexslider({
                animation: "slide",
                directionNav: true,
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#property-carousel-two",
                start: function(slider) {
                    slider.removeClass('loading');
                }
            });
        }
        if (jQuery().jcarousel) {
            jQuery('#property-detail-flexslider .flex-control-nav').jcarousel({
                vertical: true,
                scroll: 1
            });
            jQuery('.brands-carousel .brands-carousel-list ').jcarousel({
                scroll: 1
            });
        }
        var param = {
            speed: 500,
            imageW: 245,
            minItems: 1,
            margin: 30,
            onClick: function($object) {
                window.location = $object.find('a').first().attr('href');
                return true;
            }
        };

        function cstatus(a, b, c) {
            var temp = a.children("li");
            temp.last().attr('style', 'margin-right: 0px !important');
            if (temp.length > c) {
                b.elastislide(param);
            }
        };
        if (jQuery().elastislide) {
            var fp = $('.featured-properties-carousel .es-carousel-wrapper ul'),
                fpCarousel = $('.featured-properties-carousel .carousel');
            cstatus(fp, fpCarousel, 4);
        }
        if (jQuery().swipebox) {
            $(".swipebox").swipebox({
                hideBarsDelay: false
            });
        }
    });
})(jQuery);
var cache_guide = {};

function loadguide(id, code) {
    $('.popover_show').not('#' + id).popover('hide');
    if ($('#' + id).hasClass('popover_show')) {
        return false;
    }
    $('#' + id).addClass('popover_show');
    var html_tin_doi_tac = '';
    var flag = false;
    if (Object.keys(cache_guide).length > 0) {
        $.each(cache_guide, function(key, value) {
            if (key == code) {
                $('#' + id).attr('data-content', value);
                $('#' + id).popover('show');
                flag = false;
                return false;
            } else {
                flag = true;
            }
        });
    } else {
        flag = true;
    }
    if (flag == true) {
        $.ajax({
            url: '/ajax/getgui',
            type: 'POST',
            dataType: 'json',
            data: {
                code: code
            },
            success: function(result) {
                html_tin_doi_tac = '<div class="popover_title">' + result['name'] + '<span class="popover_close" onclick="closepopover(this)"><img src="/wp-content/themes/mangvieclam/images/icon_close.png" > </span></div><div class="popover_content">' + result['content'] + '</div>';
                $('#' + id).attr('data-content', html_tin_doi_tac);
                $('#' + id).popover('show');
                cache_guide[code] = html_tin_doi_tac;
            }
        });
    }
}
jQuery(document).ready(function($) {
    $('#notifications').click(function(event) {
        $.ajax({
            url: '/ajax/notifications',
            type: 'post',
            dataType: 'json',
            data: {
                param1: 'value1'
            },
            success: function(results) {
                var titleNoti = '';
                if (results) {
                    $.each(results, function(index, val) {
                        titleNoti = titleNoti + '<li class="mark_as_read_' + val.mark_as_read + '"><a class="clearfix" href="/notifications/details/' + val.id + '/">' + val.title + '<span class="pull-right text-muted date_notifications">' + val.created + '</span></a></li>';
                    });
                    $('.crb-dropdown-noti').html(titleNoti);
                } else {
                    $('.crb-dropdown-noti').html('<li class="mark_as_read_1"><a href="javascript:void(0)"><span class="fa fa-envelop"></span> KhĂƒÂ´ng cĂƒÂ³ thĂƒÂ´ng bĂƒÂ¡o mĂ¡Â»â€ºi!</a></li>');
                }
            }
        });
    });
});
var cache_guides1 = {};
var cache_element = '';
var mouse_stop;

function deactiveguides() {
    $('#guides').removeClass('active');
}

function stopguides() {}

function loadguides1(id, code) {
    return false;
    mouse_stop = setTimeout(function() {
        loadguides2(id, code);
    }, 250);
}

function loadguides2(id, code) {
    if (cache_element != '') {
        if (cache_element.search(id) == -1) {
            cache_element += ', #' + id;
        }
    } else {
        cache_element = '#' + id;
    }
    var scroll = $(document).scrollTop();
    var height = $('#' + id).height();
    var width = $('#' + id).width();
    var top = $('#' + id).offset().top - scroll;
    var left = $('#' + id).offset().left;
    var windowWidthSize = $(window).width(),
        wrapperWidth = 230;
    console.log(windowWidthSize);
    console.log(left);
    console.log(windowWidthSize - left);
    console.log(wrapperWidth);
    var flag = false;
    if (Object.keys(cache_guides1).length > 0) {
        $.each(cache_guides1, function(key, value) {
            if (key == code) {
                $('#guides').find('.guides_title').html(value['name']);
                $('#guides').find('.guides_content').html(value['content']);
                $('#guides').addClass('active');
                $('#guides').css({
                    'top': top + (height / 2) - 2,
                    'left': left + width - 65,
                })
                if (windowWidthSize - left < 230 - 65) {
                    $('.guides_hanger').addClass('guides_hanger_left');
                    $('#guides').css('left', left - (230 - 65));
                } else {
                    $('.guides_hanger').removeClass('guides_hanger_left');
                }
                set_guides_hanger(id);
                flag = false;
                return false;
            } else {
                flag = true;
            }
        });
    } else {
        flag = true;
    }
    if (flag == true) {
        $.ajax({
            url: '/ajax/getgui/',
            type: 'POST',
            dataType: 'json',
            data: {
                code: code
            },
            success: function(result) {
                $('#guides').find('.guides_title').html(result['name']);
                $('#guides').find('.guides_content').html(result['content']);
                cache_guides1[code] = result;
                $('#guides').css({
                    'top': top + (height / 2) - 2,
                    'left': left + width - 65,
                })
                if (windowWidthSize - left < 230 - 65) {
                    $('.guides_hanger').addClass('guides_hanger_left');
                    $('#guides').css('left', left - (230 - 65));
                } else {
                    $('.guides_hanger').removeClass('guides_hanger_left');
                }
                $('#guides').addClass('active');
                set_guides_hanger(id);
            }
        });
    }
}

function set_guides_hanger(id) {
    var top = $('#' + id).offset().top;
    $(window).scroll(function(event) {
        var scrolltop = $(document).scrollTop();
        $('#guides').css({
            top: top - scrolltop + 8,
        });
    });
}
$(document).ready(function() {
    $('body').click(function(event) {
        if (!$(event.target).is(cache_element)) {
            if ($('#guides').hasClass('active')) {
                $('#guides').removeClass('active');
            };
        }
    });
});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function setCookie(name, value, minute) {
    var d = new Date();
    d.setTime(d.getTime() + (minute * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + "; " + minute;
}

function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
$(document).ready(function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        if (input.length) {
            input.val(log);
        }
    });
});
$(document).ready(function() {
    $('._v-profile-content #profile_content').css('display', 'none');
    $('._v-btn-cancel-ruu').css('display', 'none');
    $('._v-btn-edit-ruu-submit').css('display', 'none');
    _v_on_btn();
    _v_off_btn();
    _v_save_btn();
    $('._v-btn-edit-ruu-submit').click(function(e) {
        $(this).each(function(index) {
            var disabled = $(this).closest('._v-r-form_create').find('select:disabled').removeAttr('disabled');
            var _v_value_form = {};
            var check_value = 0;
            $(this).closest('._v-r-form_create').serializeArray().map(function(x) {
                _v_value_form[x.name] = x.value;
            });
            disabled.attr('disabled', 'disabled');
            $.ajax({
                url: "/users/updateajax/",
                type: 'post',
                dataType: 'json',
                data: {
                    users: _v_value_form,
                    profile_workplacedesired: profile_workplacedesired
                },
                success: function(data) {
                    var dt = data.status;
                    if (dt == 'success') {
                        $.ajax({
                            url: "/users/getinfo/",
                            type: 'post',
                            dataType: 'json',
                            data: {},
                            success: function(result) {
                                var rs = result;
                                $.each(rs, function(key, value) {
                                    $("textarea[name=" + key + "]").text(value);
                                    $("input[name=" + key + "]").attr('value', value);
                                    $("select[name='" + key + "']").find('option').filter('[selected="selected"]').removeAttr('selected');
                                    $("select[name='" + key + "']").find('option').filter('[value="' + value + '"]').attr('selected', 'selected');
                                    $("select[name='" + key + "']").find('option').filter('[value="' + value + '"]').prop('selected', true);
                                });
                            }
                        });
                    }
                }
            });
        });
    });
})

function _v_on_btn() {
    $('._v-btn-edit-ruu').each(function(index) {
        $(this).click(function(e) {
            $(this).parents('._v-box-profile').find('input , select , textarea').removeAttr('readonly disabled');
            $(this).parents('._v-box-profile').find('._v-tagp-content').css('display', 'none');
            $(this).parents('._v-box-profile').find('#profile_content').css({
                'display': 'block',
                'margin-bottom': '5px'
            });
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu').css('display', 'none');
            $(this).parents('._v-box-profile').find('._v-btn-cancel-ruu').css('display', 'inline-block');
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu-submit').css('display', 'inline-block');
        });
    });
}

function _v_off_btn() {
    $('._v-btn-cancel-ruu').each(function(index) {
        $(this).click(function(e) {
            $(this).parents('._v-box-profile').find('._v-btn-cancel-ruu').css('display', 'none');
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu-submit').css('display', 'none');
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu').css('display', 'inline-block');
            $(this).parents('._v-box-profile').find('input , textarea').prop('readonly', true);
            $(this).parents('._v-box-profile').find('select').prop('disabled', true);
            $(this).parents('._v-box-profile').find('._v-tagp-content').css('display', 'block');
            $(this).parents('._v-box-profile').find('#profile_content').css({
                'display': 'none',
                'margin-bottom': '0px'
            });
            $(this).parents('form').trigger('reset');
        });
    });
}

function _v_save_btn() {
    $('._v-btn-edit-ruu-submit').each(function(index) {
        $(this).click(function(e) {
            var _v_val_length = $(this).parents('._v-box-profile').find('input , select , textarea').val();
            if (_v_val_length.length < 1) {
                alert('Vui lĂƒÂ²ng nhĂ¡ÂºÂ­p Ă„â€˜Ă¡ÂºÂ§y Ă„â€˜Ă¡Â»Â§ dĂ¡Â»Â¯ liĂ¡Â»â€¡u');
                return false;
            }
            $(this).parents('._v-box-profile').find('._v-btn-cancel-ruu').css('display', 'none');
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu-submit').css('display', 'none');
            $(this).parents('._v-box-profile').find('._v-btn-edit-ruu').css('display', 'inline-block');
            $(this).parents('._v-box-profile').find('input , textarea').prop('readonly', true);
            $(this).parents('._v-box-profile').find('select').prop('disabled', true);
            $(this).parents('._v-box-profile').find('._v-tagp-content').css('display', 'block');
            $(this).parents('._v-box-profile').find('#profile_content').css({
                'display': 'none',
                'margin-bottom': '0px'
            });
            var text_profile_content = $(this).parents('._v-box-profile').find('#profile_content').val();
            $(this).parents('._v-box-profile').find('._v-tagp-content').html(text_profile_content);
        });
    });
}
if ($('.swiper-wrapper').length) {
    $(function() {
        var owl_1001 = $(".swiper-wrapper");
        owl_1001.owlCarousel({
            items: 4,
            slideBy: 3,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            pagination: false
        });
        $(".swiper-btn-next").click(function() {
            owl_1001.trigger('next.owl.carousel');
        });
        $(".swiper-btn-prev").click(function() {
            owl_1001.trigger('prev.owl.carousel');
        });
    });
}
$(document).ready(function(e) {
    $(function() {
        $('[data-toggle="popover"]').popover();
    });
    $('body').on('click', function(e) {
        $('[data-toggle="popover"]').each(function() {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
});
$("#nav-user").on('click', function(event) {
    $("#bao_bao_ils").fadeToggle(500);
    $("#bao_bao_ils").on('click', function() {
        $(".bao_uls").fadeOut(500);
        $("#bao_bao_ils").fadeOut(500);
    });
    $(".bao_uls").fadeToggle(500);
});
$(document).ready(function() {
    var w_search_fulltext = $(window).width() - $('.icon_search').width() - $('#nav_icon').outerWidth();
    $('#search_fulltext').css('width', w_search_fulltext);
    $('.icon_search').click(function(event) {
        if ($(this).hasClass('active') && $('#search_fulltext').val() != '') {
            $('#frm_search_fulltext').submit();
        };
        if ($(this).hasClass('active')) {
            $('#search_fulltext').css('display', 'none');
            $(this).removeClass('active');
        } else {
            $('#search_fulltext').css('display', 'block');
            $(this).addClass('active');
            $('#search_fulltext').focus();
        }
    });
    $('#search_fulltext').keyup(function(event) {
        if (event.which == 13) {
            $('#frm_search_fulltext').submit();
        };
    });
    $('.btn-back-browser').click(function() {
        parent.history.back();
        return false;
    });
    $("#search_fulltext").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/ajax/suggestsearch",
                dataType: "json",
                data: {
                    q_search: request.term,
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        console.log(request.term);
                        console.log(data);
                        return {
                            label: item.text,
                            value: item.link
                        };
                    }));
                }
            });
        },
        focus: function(event, ui) {
            $("#search_fulltext").val(ui.item.label);
            return false;
        },
        select: function(event, ui) {
            event.preventDefault();
            $("#search_fulltext").val(ui.item.label);
            window.location = '/' + ui.item.value;
        },
        open: function(result) {
            if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                $('.ui-autocomplete').off('menufocus hover mouseover');
            }
        },
    });
});
$(document).ready(function() {
    var height = $(window).height();
    $('.nav-menu').css({
        'max-height': height
    });
});
$(document).ready(function() {
    $('.themboloc').click(function(event) {
        $('.tuychontimkiem').slideToggle('fast');
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
    $(".js-example-basic-single").select2({
        width: 'style',
        matcher: function(params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            var text = change_alias(data.text);
            var term = params.term.toLowerCase();
            if (text.indexOf(term) >= 0) {
                var modifiedData = $.extend({}, data, true);
                return modifiedData;
            } else {
                return null;
            }
        },
    });
    $('.type').on('click', function(event) {
        $('#t').val($(this).attr('data-value'));
        $('.type').removeClass('active');
        $(this).addClass('active');
    });
});

function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/Ăƒ |ĂƒÂ¡|Ă¡ÂºÂ¡|Ă¡ÂºÂ£|ĂƒÂ£|ĂƒÂ¢|Ă¡ÂºÂ§|Ă¡ÂºÂ¥|Ă¡ÂºÂ­|Ă¡ÂºÂ©|Ă¡ÂºÂ«|Ă„Æ’|Ă¡ÂºÂ±|Ă¡ÂºÂ¯|Ă¡ÂºÂ·|Ă¡ÂºÂ³|Ă¡ÂºÂµ/g, "a");
    str = str.replace(/ĂƒÂ¨|ĂƒÂ©|Ă¡ÂºÂ¹|Ă¡ÂºÂ»|Ă¡ÂºÂ½|ĂƒÂª|Ă¡Â»Â|Ă¡ÂºÂ¿|Ă¡Â»â€¡|Ă¡Â»Æ’|Ă¡Â»â€¦/g, "e");
    str = str.replace(/ĂƒÂ¬|ĂƒÂ­|Ă¡Â»â€¹|Ă¡Â»â€°|Ă„Â©/g, "i");
    str = str.replace(/ĂƒÂ²|ĂƒÂ³|Ă¡Â»Â|Ă¡Â»Â|ĂƒÂµ|ĂƒÂ´|Ă¡Â»â€œ|Ă¡Â»â€˜|Ă¡Â»â„¢|Ă¡Â»â€¢|Ă¡Â»â€”|Ă†Â¡|Ă¡Â»Â|Ă¡Â»â€º|Ă¡Â»Â£|Ă¡Â»Å¸|Ă¡Â»Â¡/g, "o");
    str = str.replace(/ĂƒÂ¹|ĂƒÂº|Ă¡Â»Â¥|Ă¡Â»Â§|Ă…Â©|Ă†Â°|Ă¡Â»Â«|Ă¡Â»Â©|Ă¡Â»Â±|Ă¡Â»Â­|Ă¡Â»Â¯/g, "u");
    str = str.replace(/Ă¡Â»Â³|ĂƒÂ½|Ă¡Â»Âµ|Ă¡Â»Â·|Ă¡Â»Â¹/g, "y");
    str = str.replace(/Ă„â€˜/g, "d");
    return str;
}
$(document).ready(function() {
    backtotop();
    $('a.loginbot').click(function() {
        var loginBox = '#login-box';
        $(loginBox).fadeIn(300);
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;
        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });
        $('body').addClass('overflow_hidden_mobile');
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
    });
    $('a.close_lg').click(function() {
        $('.login-popup').fadeOut(300, function() {
            $('#mask').remove();
        });
        $('#mask').fadeOut(300, function() {
            $('#mask').remove();
        });
        $('body').removeClass('overflow_hidden_mobile');
        return false;
    });
    $('#mask').click(function() {
        $('.login-popup').fadeOut(300, function() {
            $('#mask').remove();
        });
        $('#mask').fadeOut(300, function() {
            $('#mask').remove();
        });
        $('body').removeClass('overflow_hidden_mobile');
        return false;
    });
    $('.overlay-white').click(function(event) {
        $(this).stop(true, true).fadeOut('fast');
        $('.popup-action').removeClass('active').stop(true, true).fadeOut('fast');
        $(this).next().removeClass('active');
        $(this).next().find('.btn-action-global').removeClass('active');
    });
    $('.floating-action').hover(function() {
        $(this).find('.btn-action-global').addClass('active');
        $('.overlay-white').stop(true, true).fadeIn('fast');
        $('.popup-action').stop(true, true).fadeIn(1, function() {
            $(this).addClass('active');
        });
    }, function() {
        $(this).find('.btn-action-global').removeClass('active');
        $('.overlay-white').stop(true, true).fadeOut('fast');
        $('.popup-action').removeClass('active').stop(true, true).fadeOut('fast');
    });
})

function backtotop() {
    $(window).scroll(function() {
        if ($(this).scrollTop() != 0) {
            $('.go-to-top').fadeIn('fast');
        } else {
            $('.go-to-top').fadeOut('fast');
        }
    });
    $('.go-to-top').click(function(e) {
        e.preventDefault();
        $('body,html').scrollTop(0);
        $('.popup-action').removeClass('active').stop(true, true).fadeOut('fast');
    });
}
jQuery(document).ready(function($) {
    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $('#wapper-menu-2').css('margin-top', '-42px');
        } else {
            $('#wapper-menu-2').css('margin-top', '0');
        }
        lastScrollTop = st;
    });
    $('.item-child').hover(function() {
        $(this).parents('.box_header').addClass('_v-r-full-menu');
        $(this).find('._v-r-item-sub-menu').css({
            'width': '50%',
            'float': 'left'
        })
    }, function() {
        $(this).parents('.box_header').removeClass('_v-r-full-menu');
    });
});
$('#search_career , #search_city , #search_experience ,#search_degree , #search_salary').selectpicker({
    liveSearch: true,
    size: 7
});
$('#search_type_view').selectpicker();
$('#search_gender').selectpicker();
$('#search_career , #search_city , #search_experience ,#search_degree , #search_salary , #search_type_view , #search_gender').selectpicker('refresh');
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=232112893845196";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
$("#modal_apply_body_list_cv").on('click', '.apply_cv_checkbox_click', function() {
    if ($(this).is(':checked')) {
        $("#modal_apply_description").show();
        $("#modal_apply_submit").show();
    }
});
$("#submit_apply_cv").click(function() {
    if ($("#cvs_apply").val() != "") {
        $("#submit_apply_cv").hide();
        $("#submit_apply_load").show();
        $("#submit_apply_fail_message").text('');
        $.ajax({
            url: "/ajax/applyjobs",
            type: 'POST',
            dataType: 'text',
            data: {
                cv_id: $("#cvs_apply").val(),
                job_id: jobs_apply_id
            },
            success: function(result) {
                setTimeout(function() {
                    if (result != "") {
                        object_apply = $.parseJSON(result);
                        console.log(object_apply);
                        if (object_apply.status == 'success') {
                            $("#apply_jobs_load_cv").hide();
                            $("#had_apply_jobs").show();
                            $("#modal_apply_body").hide();
                            $("#modal_apply_had_apply").show();
                        } else {
                            $("#submit_apply_cv").show();
                            $("#submit_apply_load").hide();
                            $("#submit_apply_fail_message").text(object_apply.message);
                        }
                    } else {}
                }, 500);
            }
        });
    } else {}
});
$("#user_apply_description").on('change keyup paste', function() {
    $("#modal_apply_description_limit").text((500 - $("#user_apply_description").val().length) + " kĂƒÂ½ tĂ¡Â»Â± cĂƒÂ²n lĂ¡ÂºÂ¡i");
});
$('#apply_jobs_load_cv').click(function() {
    $("#submit_apply_fail_message").text('');
    $("#modal_apply_loading").show();
    $("#modal_apply_body").hide();
    $("#modal_apply_empty").hide();
    $("#modal_apply_description").hide();
    $("#modal_apply_submit").hide();
    $("#user_apply_description").val('');
    $("#modal_apply_description_limit").text('500 kĂƒÂ½ tĂ¡Â»Â± cĂƒÂ²n lĂ¡ÂºÂ¡i');
    $.ajax({
        url: "/ajax/getcvs",
        type: 'POST',
        dataType: 'text',
        data: {},
        success: function(result) {
            setTimeout(function() {
                $("#modal_apply_loading").hide();
                if (result != "") {
                    console.log(result);
                    var list_apply_cvs = $.parseJSON(result);
                    var html_apply = "";
                    $(list_apply_cvs).each(function(key, val) {
                        html_apply += '<div class="apply_cv_item"><div class="apply_cv_checkbox">';
                        html_apply += '<input type="radio" id="cvs_apply" name="cvs_apply" class="apply_cv_checkbox_click" value="' + val.id + '" ></div>';
                        html_apply += '<div class="apply_cv_info"><a href="/cv-' + val.id + '">' + val.title + '</a></div></div>';
                    });
                    $("#modal_apply_body_list_cv").empty().html(html_apply);
                    $("#modal_apply_body").show();
                } else {
                    $("#modal_apply_empty").show();
                }
            }, 500);
        }
    });
});
$('#create_jobs_expire_date').datetimepicker({
    timepicker: false,
    format: 'd-m-Y',
    lang: 'vi',
    startDate: new Date(),
    formatDate: 'd-m-Y',
    scrollMonth: false,
    scrollTime: false,
    scrollInput: false,
    onChangeDateTime: function(dp, $input) {
        $input.datetimepicker({
            startDate: $input.val()
        });
        $input.datetimepicker('hide');
    }
});
$(document).ready(function() {});
$("#button_submit_create_post").click(function() {
    var validation_create = validation_jobs_create('create_');
    console.log(validation_create);
    if (validation_create['number_error'] == 0) {
        $("#form_create_qltd").submit();
        $("#modal_create_post_loading").modal();
    } else {
        $("#modal_body_create_jobs_error").empty();
        var html_job_errors = "";
        $.each(validation_create['message'], function(key, val) {
            html_job_errors += "<p>" + val + "</p>";
        });
        $("#modal_body_create_jobs_error").html(html_job_errors);
        $("#modal_create_post_error").modal();
    }
});

function validation_jobs_create(prefix) {
    var number_error = 0;
    var array_jobs_message = [];
    var empty_jobs_message = "chÆ°a Ä‘Æ°á»£c nháº­p";
    array_jobs_message['message'] = [];
    if ($("#" + prefix + "jobs_posttitle").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TiĂªu Ä‘á»Â " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_quantity").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Sá»‘ lÆ°á»£ng " + empty_jobs_message);
    }
    current_date = Date.parse(new Date());
    expire_date = Date.parse($("#" + prefix + "jobs_expire_date").val());
    if (expire_date < current_date) {
        number_error++;
        array_jobs_message['message'].push("HĂ¡ÂºÂ¡n nĂ¡Â»â„¢p hĂ¡Â»â€œ sĂ†Â¡ khĂƒÂ´ng Ă„â€˜Ă†Â°Ă¡Â»Â£c trĂ†Â°Ă¡Â»â€ºc hiĂ¡Â»â€¡n tĂ¡ÂºÂ¡i");
    }
    if ($("#" + prefix + "jobs_contact_name").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TĂªn ngÆ°á»i liĂªn há»‡ " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_gender").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Giá»›i tĂ­nh " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_nature").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TĂ­nh cháº¥t cĂ´ng viá»‡c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_degree").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TrĂ¬nh Ä‘á»™ " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_salary").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Má»©c lÆ°Æ¡ng " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_working_type").val() == '') {
        number_error++;
        array_jobs_message['message'].push("HĂ¬nh thá»©c lĂ m viá»‡c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_experrience").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Kinh nghiá»‡m " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_trial_period").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Thá»i gian lĂ m viá»‡c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_career").val() == null) {
        number_error++;
        array_jobs_message['message'].push("Nghá» nghiá»‡pÂ " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_city").val() == null) {
        number_error++;
        array_jobs_message['message'].push("Khu vá»±c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_contact_email").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Email ngÆ°á»i liĂªn há»‡ " + empty_jobs_message);
    } else {
        var check_mail = check_email($("#" + prefix + "jobs_contact_email").val());
        if (check_mail == false) {
            number_error++;
            array_jobs_message['message'].push("Email khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng");
        }
    }
    if ($("#" + prefix + "jobs_contact_phone").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Äiá»‡n thoáº¡i liĂªn há»‡ " + empty_jobs_message);
    } else {
        var check_phone = CheckPhone($("#" + prefix + "jobs_contact_phone").val());
        if (check_phone == false) {
            number_error++;
            array_jobs_message['message'].push("Sá»‘ Ä‘iá»‡n thoáº¡i khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng");
        }
    }
    if ($("#" + prefix + "jobs_contact_address").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Äá»‹a chá»‰ liĂªn há»‡ " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_editor_description").val() == '') {
        number_error++;
        array_jobs_message['message'].push("MĂ´ táº£ cĂ´ng viá»‡c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_editor_requirement").val() == '') {
        number_error++;
        array_jobs_message['message'].push("YĂªu cáº§u cĂ´ng viá»‡c " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_editor_benefit").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Quyá»n lá»£i " + empty_jobs_message);
    }
    if ($("#" + prefix + "jobs_editor_papers").val() == '') {
        number_error++;
        array_jobs_message['message'].push("YĂªu cáº§u há»“ sÆ¡ " + empty_jobs_message);
    }
    array_jobs_message['number_error'] = number_error;
    return array_jobs_message;
}
$('#company_change_avatar').on('change', (function(e) {
    var form = document.getElementById('form_company_info');
    var formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: '/ajax/uploadavatarcompany',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            var data_info = $.parseJSON(data);
            if (data_info.result_status == "true") {
                console.log(data_info.path);
                $("#rec_avatar").val(data_info.path);
                console.log($("#rec_avatar").val());
                $("#avatar_company_show").empty().append("<img src='https://cdn.mangvieclam.com/images/user/thumb/100x71" + data_info.path + "' >");
            } else {
                $("#avatar_company_show").empty().append(data_info.result_message);
            }
        },
        error: function(data) {
            $("#avatar_company_show").empty().append("ÄÄƒng áº£nh khĂ´ng thĂ nh cĂ´ng");
        }
    });
    $("#company_change_avatar").empty();
}));
$("#button_submit_update_info_company").click(function() {
    var validation_update = validation_update_info_company();
    if (validation_update['number_error'] == 0) {
        $("#form_company_info").submit();
    } else {
        $("#modal_body_update_info_company_error").empty();
        var html_job_errors = "";
        $.each(validation_update['message'], function(key, val) {
            html_job_errors += "<p>" + val + "</p>";
        });
        $("#modal_body_update_info_company_error").html(html_job_errors);
        $("#modal_update_info_company_error").modal();
    }
});

function validation_update_info_company() {
    var number_error = 0;
    var array_jobs_message = [];
    var empty_jobs_message = "chÆ°a Ä‘Æ°á»£c nháº­p";
    array_jobs_message['message'] = [];
    if ($("#company_name").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TĂªn cĂ´ng ty " + empty_jobs_message);
    }
    if ($("#company_phone").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Sá»‘ Ä‘iá»‡n thoáº¡i cĂ´ng ty " + empty_jobs_message);
    } else {
        var check_phone = CheckPhone($("#company_phone").val());
        if (check_phone == false) {
            number_error++;
            array_jobs_message['message'].push("Sá»‘ Ä‘iá»‡n thoáº¡i cĂ´ng ty khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng");
        }
    }
    if ($("#company_place").val() == null) {
        number_error++;
        array_jobs_message['message'].push("ThĂ nh phá»‘ " + empty_jobs_message);
    }
    if ($("#company_size").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Quy mĂ´ cĂ´ng ty " + empty_jobs_message);
    }
    if ($("#company_email").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Email cĂ´ng ty " + empty_jobs_message);
    } else {
        var check_mail = check_email($("#company_email").val());
        if (check_mail == false) {
            number_error++;
            array_jobs_message['message'].push("Email khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng");
        }
    }
    if ($("#company_contact_person").val() == '') {
        number_error++;
        array_jobs_message['message'].push("TĂªn ngÆ°á»i liĂªn há»‡ " + empty_jobs_message);
    }
    if ($("#company_address").val() == '') {
        number_error++;
        array_jobs_message['message'].push("Äá»‹a chá»‰ cĂ´ng ty " + empty_jobs_message);
    }
    if ($("#company_profile").val() == '') {
        number_error++;
        array_jobs_message['message'].push("ThĂ´ng tin cĂ´ng ty " + empty_jobs_message);
    }
    array_jobs_message['number_error'] = number_error;
    return array_jobs_message;
}

function uppost(jobs_id) {
    $.ajax({
        url: '/ajax/uppost',
        type: 'POST',
        dataType: 'json',
        data: {
            id_post: jobs_id
        },
        success: function(result) {
            if (result['status'] == 'success') {
                $("#btn_uppost_" + jobs_id).hide();
            }
            alert(result['message']);
        }
    });
}
$("#tab_user_menu_btn_company").click(function() {
    $("#tab_user_menu_btn_company").addClass("per_tool_tab_active");
    $("#tab_user_menu_tab_company").show();
    $("#tab_user_menu_btn_employee").removeClass("per_tool_tab_active");
    $("#tab_user_menu_tab_employee").hide();
});
$("#tab_user_menu_btn_employee").click(function() {
    $("#tab_user_menu_btn_company").removeClass("per_tool_tab_active");
    $("#tab_user_menu_tab_company").hide();
    $("#tab_user_menu_btn_employee").addClass("per_tool_tab_active");
    $("#tab_user_menu_tab_employee").show();
});

/**
 * JavaScript Mobile NhaDatSo.Com
 * @version 2.0.0 
 */

jQuery(document).ready(function($) {
    // Show full meta tag H2, H3 button
    var metaHidden = $('.meta-hidden');
        $('<a href="javascript:void(0)" class="see-more" style="float: right;font-size: 16px;margin: -23px 0 0 0;"><span class="fa fa-angle-double-right"></span></a>').insertAfter(metaHidden);
    if ($('.see-more')[0]) {
        var seeMoreButton = $('.see-more');
        seeMoreButton.click(function(event) {
            metaHidden.css({
                maxHeight: '100px',
                height: 'auto',
            });
            $(this).css('display', 'none');
        });
    }
    if ( metaHidden.height() < 42 ) {
        $('.see-more').css('display', 'none');
    }
    
    // Activate the breaking section
    var topNewsButton = $('#topNewsButton');
    var topNewsSection = $('#topnews_mobile');
    var topNewsContent = $('.topnews_content');
    var marked = 0;
    var ajaxLoaded = 0;
    var html = '';

    

    topNewsButton.click(function(event) {
        if (topNewsSection.hasClass('active_topnews')) {
            topNewsButton.removeClass('topnews_active');
            topNewsSection.removeClass('active_topnews');
            $('#wapper-menu').removeClass('caribe-box-shadow-none');
            $('body').css({
                position: 'static',
                top: '0px',
                right: '0px',
                left: '0px'
            });
            $('#wapper-menu').removeClass('caribe-z-index-9b1');
            topNewsSection.removeClass('caribe-z-index-9b');
        }else {
            topNewsButton.addClass('topnews_active');
            topNewsSection.addClass('active_topnews');
            $('#wapper-menu').addClass('caribe-box-shadow-none');
            $('body').css({
                position: 'fixed',
                top: '0px',
                right: '0px',
                left: '0px',
            });
            $('#wapper-menu').addClass('caribe-z-index-9b1');
            topNewsSection.addClass('caribe-z-index-9b');
        }
    });
    // Live Chat
    $('.online-support').hide();
    $('.support-icon-right h3').click(function(e) {
        e.stopPropagation();
        if ($('.online-support').is(':visible')) {
            $('.online-support').slideToggle(200);
            if ($('#box-realty-saved').hasClass('margin-bottom-0')) {
                $('.support-icon-right').css('width', '50px');
            }else{
                $('.support-icon-right').css('width', '140px');
            }
            $('.support-icon-right').removeClass('active-live-chat');
            $('body').css('position', 'static');
        }else{
            $('.online-support').slideToggle(200);
            $('.support-icon-right').css('width', $(window).width());
            $('.support-icon-right').addClass('active-live-chat');
            $('body').css({
                'position': 'fixed',
                'top': '0',
                'left': '0'
            });
        }
    });
    $('.online-support').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('.online-support').slideUp(200);
    });

    $('.fb-page').attr('data-width', $(window).width());
    $('.fb-page').attr('data-height', $(window).height()-50);
    //nav bottom
    $('.bottom-nav-item').on('click', '#more-contents', function(e) {
        e.stopPropagation();
        if ($('#more-section').hasClass('more-contents-active')) {
            $('#more-section').removeClass('more-contents-active');
            $(this).removeClass('active');
            $('body').removeClass('body-fixed');
            $('.bottom-navigation').find('.nav-button-non-active').removeClass('nav-button-non-active');
        }else{
            $('#more-section').addClass('more-contents-active');
            $('.bottom-navigation').find('.active').addClass('nav-button-non-active');
            // $('.bottom-nav-item > a').removeClass('active');
            $(this).addClass('active');
            $('body').addClass('body-fixed');
        }
    });

    $('#more-section').on('click', '#save_jobs_button', function(e) {
        e.stopPropagation();
        if ($('#save_jobs_section').hasClass('more-contents-active')) {
            $('#save_jobs_section').removeClass('more-contents-active');
            $(this).removeClass('active');
            $('body').removeClass('body-fixed');
        }else{
            $('#save_jobs_section').addClass('more-contents-active');
            // $('.bottom-nav-item > a').removeClass('active');
            $(this).addClass('active');
            $('body').addClass('body-fixed');
        }
    });

    //back to top
    var scroll_top = $(window).scrollTop();
    $(window).scroll(function(event) {
        if (scroll_top>$(window).scrollTop() && $(window).scrollTop()>150) {
            if (!$('#backtotop>span').hasClass('active')) {
                $('#backtotop').css('display','block');
                testAnim('bounceIn');
                $('#backtotop>span').addClass('active');
            }
        }else{
            $('#backtotop>span').removeClass('active');
            $('#backtotop').css('display','none');
        }
        scroll_top = $(window).scrollTop();
    });
    $('#backtotop').click(function(event) {
        $('body,html').scrollTop(0);
        $('#backtotop>span').removeClass('active');
        $('#backtotop').css('display','none');
    });
    function testAnim(x) {
    $('#backtotop').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass();
        });
      };
});


//////// script scroll title menu -->

$(document).ready(function() {
    
// $('#save-realty').click(function(e){

//     var idx = $('#save-realty').attr('data-id');
//     var save = $('#save-realty').attr('data-save');
//     if(save == 'true') {
//         $.ajax({
//             url: '/ajax/saverealty/',
//             type: 'post',
//             dataType: 'json',
//             data: {
//                 idx: idx
//             },
//             success: function(data) {

//                 var number = 0;
//                 $.each(data, function(key,value) {
//                     if(value.status == 'true') {
//                         $('#list-realty-saved').append('<li class="'+idx+'"><div class="lrs-left"><a href="http://nhadat.so/'+idx+'">'+value.title+'</a></div><div class="lrs-right"><i class="fa fa-remove" id="'+idx+'" onclick="removerealty(this)" data-id="'+idx+'"></i></div><div class="clear"></div></li>');
//                         number = parseInt(number) +1;
//                         show_animate('#msg-ani','fadeInDown');
//                         $('#msg-ani').css('visibility', 'visible');
//                         $('.more-item').removeClass('hide');
//                         $('#realty_save_total').removeClass('hide');
//                         $('#realty_save_total').text(data[1].total);
//                         $('#realty_save_total11').text(data[1].total);
//                         setTimeout(function() {
//                            show_animate('#msg-ani','fadeOutUp');
                            
//                         },5000)
//                     }   
//                     $('#save-realty').html('<i class="fa fa-floppy-o" style="font-size: 15px;"></i> Đã lưu');
//                 });
//                 $('.box-realty-saved').attr('data-number',number);
//                 $('#number-realty-saved').html('Đã lưu ('+number+')');
//                 if(number > 0 ) {
//                     $('.support-icon-right').css('width', '50px');
//                     $('.box-realty-saved').addClass('margin-bottom-0');
//                 }
//                 var save = $('#save-realty').attr('data-save','false');
                
//             }
//         });
//     }
// });
$('#btn-chevron').click(function(e){

    var chevron = $('#chevron-icon').attr('data-chevron');
    if(chevron == 'down') {
        $('#chevron-icon').attr('data-chevron','up');
        $('#chevron-icon').attr('class','fa fa-chevron-up');
        $('.box-rs-title').removeClass('padding-top-bot-5');
    }else {
        $('.box-rs-title').addClass('padding-top-bot-5');
        $('#chevron-icon').attr('data-chevron','down');
        $('#chevron-icon').attr('class','fa fa-chevron-down');
    }
});
});

// $(document).ready(function(e){

//     $.ajax({
//         url: '/ajax/getalllistrealty/',
//         type: 'post',
//         dataType: 'json',
//         data: {},
//         success: function(data){
//             var number = 0;
//             $.each(data, function(key,value) {
//                 if(value.status == 'true') {
//                     $('#list-realty-saved').append('<li class="'+value.idx+'"><div class="lrs-left"><a href="http://nhadat.so/'+value.idx+'">'+value.title+'</a></div><div class="lrs-right"><i class="fa fa-remove" id="'+value.idx+'" onclick="removerealty(this)" data-id="'+value.idx+'"></i></div><div class="clear"></div></li>');
//                     number = parseInt(number) +1;
//                     $('.btn-save-realty-'+value.idx).html('<i class="fa fa-floppy-o" style="font-size: 15px;"></i> Đã lưu');
//                     $('.btn-save-realty-'+value.idx).attr('data-save','false');
//                 }   
//             });
//             $('.box-realty-saved').attr('data-number',number);
//             $('#number-realty-saved').html('Đã lưu ('+number+')');
//             if(number > 0 ) {
//                 $('.support-icon-right').css('width', '50px');
//                 $('.box-realty-saved').addClass('margin-bottom-0');
//             }else{
//                 $('.support-icon-right').css('width', '140px');
//             }

//             var height_window = $(window).height();
//             if( (height_window - 40) < (number * 40) ) {
//                 $('#list-realty-saved').css('max-height',(height_window - 40) );
//                 $('#list-realty-saved').css('overflow-y','scroll');
//             }
//         }
//     });


// });
function removerealty (e){
    var question = confirm('Bạn chắc chắn muốn xóa');
    if(question == true ) {

        var idx = $(e).attr('data-id');
        $.ajax({
            url: "/ajax/removerealty/",
            type:'post',
            dataType: 'json',
            data: {idx: idx},
            success: function(data) {
                $.each(data, function(key,value) {
                    if(value.status == 'true') {
                        $('.'+idx).remove();
                        var number = $('.box-realty-saved').attr('data-number');
                        number = parseInt(number) - 1;
                        $('.box-realty-saved').attr('data-number',number);
                        $('#number-realty-saved').html('Đã lưu ('+number+')');
                        if(number == 0 ) {
                            $('.box-realty-saved').removeClass('margin-bottom-0');
                            $('.support-icon-right').css('width', '140px');
                        }
                        $('.btn-save-realty-'+idx).html('<i class="fa fa-floppy-o" style="font-size: 15px;"></i> Lưu tin');
                        $('.btn-save-realty-'+idx).attr('data-save','true');
                    }
                });
                

            }
        });
    }
}  
function show_animate(id,x) {
    $(id).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          //$(this).removeClass();
        });
      };
/* End 1.0 - Script V3 NDS */