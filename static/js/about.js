$(function(){
    var siteH = $('#site').height();
    var emailH = $('#email').height();
    if (siteH > emailH) {
        $('#email').height(siteH);
    } else {
        $('#site').height(emailH);
    }
});