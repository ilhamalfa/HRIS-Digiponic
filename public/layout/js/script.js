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
console.log(openingH1);
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
})
// Scroll Animations End