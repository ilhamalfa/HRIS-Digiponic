const designTopbar = document.getElementById('design-topbar')
const topbar = document.getElementById('topbar')
const hamburgerMenu = document.getElementById('hamburger-menu')
const navbar = document.getElementById('navbar')
const span = hamburgerMenu.querySelectorAll('span')

hamburgerMenu.addEventListener('click', function() {
    navbar.classList.toggle('show')
})

document.addEventListener('click', function (e) {
    if (!hamburgerMenu.contains(e.target) && !navbar.contains(e.target)) {
        navbar.classList.remove('show')
    }
})

// Animation Opening Start
const openingH1 = document.querySelector('.jib-parallax h1')
const openingH6 = document.querySelector('.jib-parallax h6')
setTimeout(function () {
    openingH1.classList.add('fade')
}, 1000)
setTimeout(function () {
    openingH6.classList.add('fade')
}, 1500)
// Animation Opening End

// Scroll Animations Start
$(window).scroll(function () {
    let wScroll = $(this).scrollTop()
    if (wScroll > 150 || wScroll > 1) {
        navbar.classList.remove('show')
        designTopbar.classList.add('background')
        navbar.classList.add('background')
        navbar.classList.add('change')
        hamburgerMenu.classList.add('background')
        span.forEach(function (e) {
            e.classList.add('background')
        })
    } else {
        designTopbar.classList.remove('background')
        navbar.classList.remove('background')
        navbar.classList.remove('change')
        hamburgerMenu.classList.remove('background')
        span.forEach(function (e) {
            e.classList.remove('background')
        })
    }

    // Jumbotron Animation Start
    $('.jib-parallax .design div').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
    
    $('.jib-parallax .text-scroll').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
    // Jumbotron Animation End

    // Career Annimations Start
    if (wScroll > $('.career').offset().top - 550) {
        $('.career h1').css({
            'opacity' : '1',
            'transform' : 'translateY(0)'
        })
    } else {
        $('.career h1').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
    }
    // Career Annimations End

    // About Us Animations Start
    if (wScroll > $('.about-us').offset().top - 550) {
        $('.about-us h1').css({
            'opacity' : '1',
            'transform' : 'translateY(0)'
        })
    } else {
        $('.about-us h1').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
    }
    // About Us Animations End

    // Comment Animations Start
    let comment = $('.comment').offset().top
    if (wScroll > comment - 500) {
        $('.carrousel-comment').css({
            'opacity' : '1',
            'transform' : 'translateY(0)'
        })
        $('.comment .animations1 div').css({
            'transform' : 'translate(0px, -' + (wScroll - comment) +'%)'
        })
        $('.comment .animations2 div').css({
            'transform' : 'translate(0px,' + (wScroll - comment)*2 +'%)'
        })
    } else {
        $('.carrousel-comment').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
    }
    
    // Comment Animations End

    // Footer Animations Start
    let footer = $('.footer').offset().top
    if (wScroll > footer - 500) {
        $('.footer .logo img.logo').css({
            'opacity' : '1',
            'transform' : 'translateY(0)'
        })
        setTimeout(function () {
            $('.footer .text-footer').css({
                'opacity' : '1',
                'transform' : 'translateY(0)'
            })
        }, 500)
    } else {
        $('.footer .logo img.logo').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
        $('.footer .text-footer').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
    }
    // Footer Animations End
})
// Scroll Animations End