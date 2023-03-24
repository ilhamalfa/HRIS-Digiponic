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

    // Jib Parallax Start
    $('.jib-parallax .design div').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })

    $('.jib-parallax .text-scroll').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
    // Jib Parallax End

    // Career Annimations Start
    if (wScroll > $('.career').offset().top - 550) {
        $('.career h1').css({
            'opacity' : '1'
        })
    } else {
        $('.career h1').css({
            'opacity' : '0'
        })
    }
    // Career Annimations End

    // About Us Animations Start
    
    // About Us Animations End
})

