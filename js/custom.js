$(document).ready(function($){
    var nav = $('nav');
    var navLink = $('nav ul li a');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 15) {
            nav.addClass("nav_colored");
            navLink.addClass("nav-link_colored");
        } else {
            nav.removeClass("nav_colored");
            navLink.removeClass("nav-link_colored");
        }
    });
});
