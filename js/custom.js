$(document).ready(function($){
    var nav = $('nav');
    var navLink = $('nav ul li a');
    var navBrand = $('a.navbar-brand');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
            nav.addClass("nav_colored");
            navLink.addClass("nav-link_colored");
            navBrand.addClass("nav-link_colored")
        } else {
            nav.removeClass("nav_colored");
            navLink.removeClass("nav-link_colored");
            navBrand.removeClass("nav-link_colored");
        }
    });
});

//custom smoothscroll
function scrollNav() {
  $('.nav a').click(function(){  
    $('html, body').stop().animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 30
    }, 600);
    return false;
  });
}
scrollNav();