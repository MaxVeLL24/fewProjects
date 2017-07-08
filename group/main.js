var $ = jQuery;

// .css({"color": "red", "border": "2px solid red"});
$(document).ready(function () {

    $('.accordion-group').removeClass('completed');
    $('.accordion-group:first').addClass('completed');

    $('.regular-price-wrap > input').keyup(function (e) {
        var self = $(this);
        self.removeClass('error');
        var parent = $(this).parent().parent();
        var contButton = $('button').find('.btn btn-buy').prevObject[0];
        parent.find('.error-text').each(function () {
            $(this).hide();
        });
        if (isNaN(self.val())) {
            parent.find('.bad-range').show();
            self.addClass('error');
            $(contButton).attr('disabled', 'true');
            return;
        } else if (self.val() < 2) {
            parent.find('.too-small').show();
            self.addClass('error');
            $(contButton).attr('disabled', 'true');
            return;
        } else if (self.hasClass('regularPrice') && self.val() > 999) {
            parent.find('.too-large').show();
            self.addClass('error');
            $(contButton).attr('disabled', 'true');
            return;
        }
        else if (self.hasClass('discountAmount') && self.val() > 99) {
            parent.find('.too-large').show();
            self.addClass('error');
            $(contButton).attr('disabled', 'true');
            return;
        }
        else {
            if (self.hasClass('regularPrice')) {
                $('.deal_value').find('dd').text('$' + self.val());
            } else if (self.hasClass('discountAmount')) {
                $('.deal_discount').find('dd').text(self.val() + '%');
            }
            if (!self.hasClass('error')) {
                var customPays = $('.customerPays');
                var yourReciev = $('.youReceive');
                customPays.text('$' + ($('.regularPrice').val() - ($('.regularPrice').val() * $('.discountAmount').val()) / 100));
                yourReciev.text('$' + ($('.regularPrice').val() - ($('.regularPrice').val() * $('.discountAmount').val()) / 100) / 2);
                $('.price-tag-inner').find('span').text(customPays.text());
                $('.new-price').text(customPays.text());
                $('.old-price').text('$' + $('.regularPrice').val());
                $('.deal_savings').find('dd').text('$' + $('.regularPrice').val() * $('.discountAmount').val() / 100);
                if (!$('.regularPrice').hasClass('error') && !$('.discountAmount').hasClass('error')) {
                    contButton.removeAttribute('disabled');
                }
            }

        }
        $('.btn-buy').click(function (e) {
            e.preventDefault();
            $(this).parents('.accordion-group').removeClass('open').addClass('closed').addClass('completed');
            $(this).parents('.accordion-group ').parent().next().find('.accordion-group').removeClass('closed').addClass('open');
        });

        $('.accordion-heading a').click(function (e) {
            e.preventDefault();
            $('.accordion-group').removeClass('open').addClass('closed');
            if (!$(this).parents('.accordion-group').hasClass('completed')) {
                return false;
            }
            $(this).parents('.accordion-group').removeClass('closed').addClass('open');
            return false;
        });


        // $('ul.slides li.thumb img').each(function () {
        //     $(this).parents('.thumb').append('<div class="remover"></div>')
        // });
    });

    $('ul.slides').click(function (event) {
        if ($(event.target).is('img')) {
            $('.uploaded').attr('src', event.target.src);
        }
    });

    $('span').parents('.upload').click(function () {
        $('input#upload-input-file').click();
        $('.thumbnails').find('.upload').before('<li class="thumb  "><span class="thumb-container"><img src=""></span></li>');

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.thumbnails').find('.slides').find('.thumb').find('img').last().attr('src', e.target.result);
                    $('.uploaded').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#upload-input-file").change(function () {
            readURL(this);
        });
    });
    $('#nutshellText').keyup(function () {
        var nutshelText = $(this).val();
        $('.changedValue ').text('From the merchant: ' + '"' + nutshelText + '"');

    });

    $('#questionnaire').find('.standout').keyup(function () {
        var fourQuestion = $(this).val();
        $('.questionnaire-content').find('.question:first').css({opacity: 1});
        $('.questionnaire-content').find('.question:first').find('p').text(fourQuestion);
    });
    $(document).click(function () {
        if ($('#finePrint').hasClass('open')) {
            $('#preview').css({"margin-top": "-215px"});
        }
        else if ($('#location').hasClass('open')) {
            $('#preview').css({"margin-top": "-850px"});
        }
        else if ($('#nutshellText').hasClass('open')) {
            $('#preview').css({"margin-top": "-243px"});
        }
        else if ($('#questionnaire').hasClass('open')) {
            $('#preview').css({"margin-top": "-528px"});
        }
        else {
            $('#preview').css({"margin-top": "0px"});
        }
    });
    $('.btn.flat-btn').click(function (event) {
        event.preventDefault();


    });
    $('.flat-btn.add').click(function () {
        $('.businessAddress').css({"display": 'none'});
        $('.add-location').css({'display': 'block'})
    });
    $('button.add_location').click(function (event) {
        event.preventDefault();
        var locationInputVal = $('#location-text-box').val();
        $('.rg-location:first').clone().css({"display": 'block'}).appendTo('.flex-active-slide');
        $('.rg-location').last().find('span:first').html(locationInputVal);
        $('.businessAddress').css({"display": 'block'});
        $('.add-location').css({'display': 'none'})


    });
    $('button.cancel_add_location').click(function (event) {
        event.preventDefault();
        $('.businessAddress').css({"display": 'block'});
        $('.add-location').css({'display': 'none'})
    });

    $('.flex-active-slide').click(function (event) {
        if ($(event.target).is('span.icon-pencil')) {
            $(event.target).parents('.rg-location').css({'display': 'none'})
        }
        else if ($(event.target).is('.rg-location input')) {
            $('.rg-location input').not(event.target).prop('checked', false);
        }
    });

});