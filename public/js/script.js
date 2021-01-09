$(window).on("load", function() {
    $(".button-up").mPageScroll2id();

    // $("a[href*='#']").mPageScroll2id({
    //     offset: 220
    // });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.button-up').css('visibility', 'visible')
                           .css('bottom', '60px');

        } else {
            $('.button-up').css('visibility', 'hidden')
                           .css('bottom', '-70px');
        }
    });
});