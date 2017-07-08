$(document).ready(function () {
    $(".slide-element").css('display', 'none');
    $(".slider-toggle li a").click(function () {
        $(".slide-element").slideToggle('slow');
    });
    $("a.Detailstart").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.pmmBalance").css('display', 'none');
        $("div.DetailBalance").slideToggle('slow');
        $(this).addClass('active');

    });
    $("a.ppmstart").click(function () {
        $("div.balance-menu ul li a").removeClass('active');
        $("div.DetailBalance").css('display', 'none');
        $("div.pmmBalance").slideToggle('slow');
        $(this).addClass('active');
    });

});