$(window).scroll(function () {
    scrollposition = $(window).scrollTop();
    if (scrollposition > 80) {
        if ($("#nav-image img").width() == 0) {
            $("#nav-image img").animate({ 'width': '12em' })
            $('.nav-top #top').removeClass('d-flex').addClass('d-none')
       }
    } else {
        if ($("#nav-image img").width() != 0) {
            $("#nav-image img").animate({ 'width': '0em' })
            $('.nav-top #top').addClass('d-flex').removeClass('d-none')
        }
    }

    // if (scrollposition < 500) {
    //     $('.scroll').addClass('d-none')
    // } else {
    //     $('.scroll').removeClass('d-none')
    // }
})


