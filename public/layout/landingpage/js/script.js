$(document).ready(function () {
    $('.preloader').delay('1500').fadeOut()
})

$(window).scroll(function () { 
    let wScroll = $(this).scrollTop()
    console.log(wScroll)

    if (wScroll == $('.about').offset().top) {
        $('.about').removeClass('parallax');
    }

    if (wScroll > $('.about').offset().top) {
        let transform = wScroll - $('.about').offset().top
        $('.about').addClass('parallax');
        if (wScroll > 700) {
            $('.about .title-1').css({
                'transform': 'translateX(-' + transform + 'px)'
            });
            $('.about .title-2').css({
                'transform': 'translateX(' + transform + 'px)'
            });
        }
        if (wScroll > 1720) {
            $('.about .image').css({
                'opacity': '0',
            });
        } else {
            $('.about .image').css({
                'opacity': '1',
            });
        }
        if (wScroll > 1800) {
            $('.about .description').css({
                'opacity': '1',
            });
            $('.about .button').css({
                'opacity': '1',
            });
        } else {
            $('.about .description').css({
                'opacity': '0',
            });
            $('.about .button').css({
                'opacity': '0',
            });
        }
    }

    if (wScroll > $('.product-introduction').offset().top) {
        $('.about').css({
            'opacity': '0',
        });
    } else {
        $('.about').css({
            'opacity': '1',
        });
    }
});