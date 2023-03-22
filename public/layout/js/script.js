// let hamburgerMenu = document.getElementById('hamburger-menu')
// let sidebar = document.getElementById('sidebar')
// let login = document.getElementById('login-mobile')
// let modal = document.getElementById('modal-mobile')

// hamburgerMenu.addEventListener('click', function(e) {
//     e.preventDefault()
//     sidebar.classList.toggle('slide')
// })

// document.addEventListener('click', function (e) {
//     if (!hamburgerMenu.contains(e.target) && !sidebar.contains(e.target) && !modal.contains(e.target)) {
//         sidebar.classList.remove('slide')
//     }
// })

// login.addEventListener('click', function(e) {
//     e.preventDefault()
//     modal.classList.add('modal-active')
// })


// modal.addEventListener('click', function() {
//     modal.classList.remove('modal-active')
// })

const designTopbar = document.getElementById('design-topbar')
const topbar = document.getElementById('topbar')
const hamburgerMenu = document.getElementById('hamburger-menu')
const navbar = document.getElementById('navbar')
const span = hamburgerMenu.querySelectorAll('span')
let cekScroll = $(this).scrollTop()

// hamburgerMenu.addEventListener('click', function() {
//     topbar.classList.toggle('change')
//     navbar.classList.toggle('show')
// })

if (cekScroll > 150) {
    hamburgerMenu.addEventListener('click', function() {
        topbar.classList.toggle('change')
        navbar.classList.toggle('show')
    })
} else {
    hamburgerMenu.addEventListener('click', function() {
        navbar.classList.toggle('show')
    })
}


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

    // Parallax
    $('.jib-parallax .design div').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })

    $('.jib-parallax .text-scroll').css({
        'transform' : 'translate(0px,' + wScroll*2 +'%)'
    })
})

