// Declaration Start
const topbar = document.getElementById('topbar')
const hamburgerMenu = document.getElementById('hamburger-menu')
const span = hamburgerMenu.querySelectorAll('span')
const navmenu = document.getElementById('navmenu')
const account = document.querySelector('.account a')
const accountMenu = document.getElementById('account-menu')
const loginButton = document.getElementById('login')
const loginAs = document.getElementById('login-as')
const openingH1 = document.querySelector('.opening h1')
const openingH6 = document.querySelector('.opening h6')

// Declaration End

// Hamburger Menu Click Start
hamburgerMenu.addEventListener('click', function() {
    navmenu.classList.toggle('show')
    accountMenu.classList.remove('show')
})

document.addEventListener('click', function (e) {
    if (!hamburgerMenu.contains(e.target) && !navmenu.contains(e.target)) {
        navmenu.classList.remove('show')
    }
})
// Hamburger Menu Click End

// Account Click Start
account.addEventListener('click', function (e) {
    e.preventDefault()
    accountMenu.classList.toggle('show')
    navmenu.classList.remove('show')
})

loginButton.addEventListener('click', function (e) {
    e.preventDefault()
    loginAs.classList.toggle('show')
})

document.addEventListener('click', function (e) {
    if (!account.contains(e.target) && !accountMenu.contains(e.target)) {
        accountMenu.classList.remove('show')
        loginAs.classList.remove('show')
    }
})
// Account Click End

// Animation Opening Start
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

    if (wScroll > 1) {
        navmenu.classList.remove('show')
        accountMenu.classList.remove('show')
    }
    if (wScroll > 150) {
        $('.topbar .brand-logo a').css({
            'color' : '#FF4655'
        })
        span.forEach(function (e) {
            e.classList.add('color-change')
        })
        $('.topbar .account a').css({
            'color' : '#FF4655'
        })
        navmenu.classList.add('background')
        accountMenu.classList.add('background')
    } else {
        $('.topbar .brand-logo a').css({
            'color' : '#212529'
        })
        span.forEach(function (e) {
            e.classList.remove('color-change')
        })
        $('.topbar .account a').css({
            'color' : '#212529'
        })
        navmenu.classList.remove('background')
        accountMenu.classList.remove('background')
    }

    // Opening Animation Start
    $('.opening .material div').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
    
    $('.opening .text-scroll').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
    // Opening Animation End

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

    // Our Product Animations Start
    
    if (wScroll > $('.product-introduction').offset().top - 550) {
        $('.product-introduction h1').css({
            'opacity' : '1',
        })
        setTimeout(function () {
            $('.product-introduction h1').css({
                'letter-spacing' : '15px',
            })
        }, 500)
        setTimeout(function () {
            $('.product-introduction .materialred1').css({
                'left' : '50%'
            })
        }, 1000)
        setTimeout(function () {
            $('.product-introduction .materialred2').css({
                'top' : '15%'
            })
        }, 1500)
        setTimeout(function () {
            $('.product-introduction .materialred3').css({
                'top' : '65%'
            })
        }, 1500)
    } else {
        $('.product-introduction h1').css({
            'opacity' : '0',
            'letter-spacing' : '0'
        })
        $('.product-introduction .materialred1').css({
            'left' : '30%'
        })
        $('.product-introduction .materialred2').css({
            'top' : '75%'
        })
        $('.product-introduction .materialred3').css({
            'top' : '15%'
        })
    }
    // Our Product Animations End
    
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

    // Our Team Animations Start
    if (wScroll > $('.team').offset().top - 550) {
        $('.team h1').css({
            'opacity' : '1',
            'transform' : 'translateY(0)'
        })
    } else {
        $('.team h1').css({
            'opacity' : '0',
            'transform' : 'translateY(20%)'
        })
    }
    // Our Team Animations End

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