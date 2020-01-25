$(document).ready(function () {
    /* toggle menu */
    $(".menu-toggle").click(function () {
        $(".slide-menu").toggleClass("active");
        $("body").toggleClass("mobile-menu-active");
    });
    $(".mobile-menu-overlay").click(function () {
        $(".slide-menu").removeClass("active");
        $("body").removeClass("mobile-menu-active");
    });
    /** Smooth Scrolling
     **====================== **/
    $(".dash_links a,.scrollTo").on('click', function (e) {
        e.preventDefault();
        var hash = this.hash;
        var scrollTopOffset = $(hash).offset().top - 120;
        $('html, body').animate({
            scrollTop: scrollTopOffset
        }, 500);
    });
    /** => End Smooth Scrolling */
    SyntaxHighlighter.all();

});