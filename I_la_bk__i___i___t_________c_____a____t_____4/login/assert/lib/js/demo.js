$(document).ready(function() {
    $('.select').select2();
    var windowHeight = $(window).height();
    var navbarHeight = $('.navbar').outerHeight();
    $("body").css({
        "height": windowHeight + "px"
    });
    $(".demoframe").css({
        "margin-top": navbarHeight + "px",
        "height": (windowHeight - navbarHeight -7)+ "px",
    });
    $(".mobile .demoframe").css({
        "margin-top": "0px",
        "height": "570px",
        "width": "326px",
    });
    $(".tablet .demoframe").css({
        "margin-top": "0px",
        "height": "1065px",
        "width": "800px",
    });
    $(".tablet_wide .demoframe").css({
        "margin-top": "0px",
        "height": "800px",
        "width": "1065px",
    });
    $(".desktop .demoframe").css({
        "margin-top": (navbarHeight + 15) + "px",
        "height": (windowHeight - navbarHeight - 80)+ "px",
        "width": "1280px",
    });
});
