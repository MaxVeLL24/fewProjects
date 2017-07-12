$(document).ready(function () {
    var time;
    $('input[name=getHint]').keyup(function (e) {
        clearTimeout(time);
        var getHint = $(this).val();
        time = setTimeout(function () {
            geth(getHint);
        }, 300);
    });
    function geth(getHint) {
        $.ajax({
            url: "getHint.php",
            type: "post",
            data: {'getHint': getHint},
            success: function (response) {
                $('a.hint').remove();
                $('div.hints').append(response);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    $('.menu-button').click(function () {
        $('.nav-menu').slideToggle('slow');
    });

    $('ul.mobile-menu').click(function (e) {
        if ($(e.target).is('.icon')) {
            if ($('ul.black-menu').hasClass('mobile')) {
                $('ul.black-menu').removeClass('mobile');
                $('ul.black-menu li').removeClass('mobile');
                $('ul.black-menu li').removeClass('mobile-invisible');
            } else {
                $('ul.black-menu').addClass('mobile');
                $('ul.black-menu li').addClass('mobile');
            }
        }

    });


    $(window).resize(function () {
        $('ul.black-menu').removeClass('mobile');
        $('ul.black-menu li').removeClass('mobile');


        if ($(window).width() > 653) {
            $('.nav-menu').css('display', 'block');
        } else {
            $('.nav-menu').css('display', 'none');
        }
        if ($(window).width() > 855) {
            $('ul.black-menu li').removeClass('mobile-invisible');
            $('ul.black-menu li').addClass('list-item');
        } else {
            $('ul.black-menu li').removeClass('list-item');
            $('ul.black-menu li').addClass('mobile-invisible');
        }
    });
});