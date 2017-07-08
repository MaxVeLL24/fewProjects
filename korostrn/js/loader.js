var myVar;
function myFunction() {
    $("#page").css('display', 'none');
    myVar = setTimeout(showPage, 1000);
}
function showPage() {
    $("#loader").css('display', 'none');
    $("#page").css('display', 'block');
}