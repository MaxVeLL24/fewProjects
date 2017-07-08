$(document).ready(function () {
    //equalheight - одинаковая высота колонок
    //Пример списка элементов:
    //var eqElement = ".cat_container > div, .home_news > div"
    // var eqElement = ".element"
    // $(window).load(function(){equalheight(eqElement);}).resize(function(){equalheight(eqElement);});
    var eqElement = ".num-item"
    $(window).load(function () {
        equalheight(eqElement);
    }).resize(function () {
        equalheight(eqElement);
    });
});

$(document).ready(function () {
    $("#master-class, #header, #reservetion").on("click", "a", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();

        //забираем идентификатор бока с атрибута href
        var id = $(this).attr('href'),

            //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;

        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 1000);
    });
});