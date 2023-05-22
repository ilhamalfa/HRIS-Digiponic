let screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
console.log(screenWidth)

if (screenWidth > 992) {
    $(document).ready(function () {
        setTimeout(function() {
            $('.opening-title').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            })
        }, 100)
        setTimeout(function() {
            $('.opening-slogan').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            })
        }, 200)
        setTimeout(function() {
            $('.opening-description').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            })
        }, 300)
        setTimeout(function() {
            $('.opening-scroll-box').css({
                'opacity': '1',
                'transform': 'translateY(0)',
            })
        }, 600)
    })
    
    $(window).scroll(function () { 
        let wScroll = $(this).scrollTop()
    
        if (wScroll > 100) {
            $('.about').addClass('fade')
            $('.opening').addClass('fade')
        } else {
            $('.about').removeClass('fade');
            $('.opening').removeClass('fade');
        }
            
        if (wScroll > 400) {
            $('.about-title-1').css({
                'transform': 'translateX(-' + (wScroll - 400)  + 'px)'
            })
            $('.about-title-2').css({
                'transform': 'translateX(' + (wScroll - 400) + 'px)'
            })
        }
    
        if (wScroll > 1200) {
            $('.about-background-color').css({
                'opacity': '50%',
                'transition': '.2s',
            })
        } else {
            $('.about-background-color').css({
                'opacity': '1',
            })
        }
    
        if (wScroll > 1400) {
            $('.about-description').css({
                'opacity': '1',
                'visibility': 'visible',
                'transform': 'translateX(0)',
            })
            $('.about-button').css({
                'opacity': '1',
                'visibility': 'visible',
                'transform': 'translateX(0)',
            })
        } else {
            $('.about-description').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(-10px)',
            })
            $('.about-button').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(10px)',
            })
        }
    
        if (wScroll > 2000) {
            $('.product-introduction').addClass('fade')
            $('.about-description').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(-10px)',
            })
            $('.about-button').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(10px)',
            })
            $('.about-background-color').css({
                'opacity': '1',
            })
            setTimeout(function() {
                $('.product-introduction-title').css({
                    'opacity': '1',
                    'visibility': 'visible',
                    'transform': 'translateX(0)',
                })
                $('.product-introduction-description').css({
                    'opacity': '1',
                    'visibility': 'visible',
                    'transform': 'translateX(0)',
                })
            }, 500)
            setTimeout(function() {
                $('.product-introduction-button').css({
                    'opacity': '1',
                    'visibility': 'visible',
                })
            }, 700)
        } else {
            $('.product-introduction').removeClass('fade')
            $('.product-introduction-title').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(-10px)',
            })
            $('.product-introduction-description').css({
                'opacity': '0',
                'visibility': 'hidden',
                'transform': 'translateX(10px)',
            })
            $('.product-introduction-button').css({
                'opacity': '0',
                'visibility': 'hidden',
            })
        }
    
        if (wScroll > 3000) {
            $('.product').addClass('fade')
            $('.product-introduction-bg-fade').css({
                'opacity': '1',
                'z-index': '998',
            })
            $('.product-introduction').css({
                'opacity': '0',
                'visibility': 'hidden',
            })
            setTimeout(function() {
                $('.product-element-left').css({
                    'opacity': '1',
                })
                $('.product-element-right').css({
                    'opacity': '1',
                })
            }, 500)
            setTimeout(function() {
                $('.product-image').css({
                    'transform': 'translateY(0)',
                })
            }, 700)
            setTimeout(function() {
                $('.product-description').css({
                    'opacity': '1',
                })
                $('.product-button-buy-box').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                })
                $('.product-button-watch-box').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                })
            }, 1000)
        } else {
            $('.product').removeClass('fade')
            $('.product-introduction-bg-fade').css({
                'opacity': '0',
                'z-index': '-998',
            })
            $('.product-introduction').css({
                'opacity': '1',
                'visibility': 'visible',
            })
            $('.product-element-left').css({
                'opacity': '0',
            })
            $('.product-element-right').css({
                'opacity': '0',
            })
            $('.product-image').css({
                'transform': 'translateY(80px)',
            })
            $('.product-description').css({
                'opacity': '0',
            })
            $('.product-button-buy-box').css({
                'opacity': '0',
                'transform': 'translateX(-20px)',
            })
            $('.product-button-watch-box').css({
                'opacity': '0',
                'transform': 'translateX(20px)',
            })
        }
    
        if (wScroll > 4000) {
            $('.topbar-logo-white').css({
                'display': 'none',
            })
            $('.topbar-logo-black').css({
                'display': 'block',
            })
            $('.topbar-logo-text').css({
                'color': 'black',
            })
            $('.topbar-menu').css({
                'color': 'black',
            })
            $('.topbar-menu').addClass('animate')
            $('.team').addClass('fade')
            $('.product-bg-fade').css({
                'opacity': '1',
                'z-index': '998',
            })
            setTimeout(function() {
                $('.team-title').css({
                    'opacity': '1',
                })
            }, 500)
            setTimeout(function() {
                $('.team-title-box span').css({
                    'opacity': '1',
                })
                $('.team-span-1').css({
                    'transform': 'translateX(0)',
                })
                $('.team-span-2').css({
                    'transform': 'translateX(0)',
                })
            }, 700)
            setTimeout(function() {
                $('.team-bg-text-1').css({
                    'opacity': '20%',
                    'transform': 'translateX(0)',
                })
                $('.team-bg-text-2').css({
                    'opacity': '20%',
                    'transform': 'translateX(0)',
                })
                $('.team-bg-text-3').css({
                    'opacity': '20%',
                    'transform': 'translateX(0)',
                })
                $('.team-element').css({
                    'opacity': '1',
                    'transform': 'translateY(0)',
                })
            }, 1000)
        } else {
            $('.topbar-logo-white').css({
                'display': 'block',
            })
            $('.topbar-logo-black').css({
                'display': 'none',
            })
            $('.topbar-logo-text').css({
                'color': 'white',
            })
            $('.topbar-menu').css({
                'color': 'white',
            })
            $('.topbar-menu').removeClass('animate')
            $('.team').removeClass('fade')
            $('.product-bg-fade').css({
                'opacity': '0',
                'z-index': '-998',
            })
            $('.team-title').css({
                'opacity': '0',
            })
            $('.team-title-box span').css({
                'opacity': '0',
            })
            $('.team-span-1').css({
                'transform': 'translateX(20px)',
            })
            $('.team-span-2').css({
                'transform': 'translateX(-20px)',
            })
            $('.team-bg-text-1').css({
                'opacity': '0',
                'transform': 'translateX(-100%)',
            })
            $('.team-bg-text-2').css({
                'opacity': '0',
                'transform': 'translateX(100%)',
            })
            $('.team-bg-text-3').css({
                'opacity': '0',
                'transform': 'translateX(-100%)',
            })
            $('.team-element').css({
                'opacity': '0',
                'transform': 'translateY(40px)',
            })
        }
    
        if (wScroll > 5000) {
            $('.topbar-logo-white').css({
                'display': 'block',
            })
            $('.topbar-logo-black').css({
                'display': 'none',
            })
            $('.topbar-logo-text').css({
                'color': 'white',
            })
            $('.topbar-menu').css({
                'color': 'white',
            })
            $('.topbar-menu').removeClass('animate')
            $('.career').addClass('fade')
            $('.team-bg-fade').css({
                'opacity': '1',
                'z-index': '998',
            })
            setTimeout(function() {
                $('.career-title').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                })
                $('.career-elementbg').css({
                    'opacity': '1',
                })
            }, 500)
            setTimeout(function() {
                $('.career-description').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                })
            }, 700)
            setTimeout(function() {
                $('.career-button').css({
                    'opacity': '1',
                })
                $('.career-employee-image').css({
                    'opacity': '1',
                    'transform': 'translateY(0)',
                })
                $('.career-element').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                })
            }, 1000)
        } else {
            $('.career').removeClass('fade')
            $('.team-bg-fade').css({
                'opacity': '0',
                'z-index': '-998',
            })
            $('.career-title').css({
                'opacity': '0',
                'transform': 'translateX(40px)',
            })
            $('.career-elementbg').css({
                'opacity': '0',
            })
            $('.career-description').css({
                'opacity': '0',
                'transform': 'translateX(10px)',
            })
            $('.career-button').css({
                'opacity': '0',
            })
            $('.career-employee-image').css({
                'opacity': '0',
                'transform': 'translateY(40px)',
            })
            $('.career-element').css({
                'opacity': '0',
                'transform': 'translateX(10px)',
            })
        }
    
        if (wScroll > 5700) {
            $('.footer').addClass('fade')
            $('.footer-left-side').css({
                'display': 'flex',
            })
            $('.footer-right-side').css({
                'display': 'flex',
            })
        } else {
            $('.footer').removeClass('fade')
            $('.footer-left-side').css({
                'display': 'none',
            })
            $('.footer-right-side').css({
                'display': 'none',
            })
        }
    })
}

let hamburgerMenuButton = document.getElementById('hamburgerMenuButton')
let hamburgerListMenu = document.getElementById('hamburgerListMenu') 

hamburgerMenuButton.addEventListener('click', function() {
    hamburgerListMenu.classList.toggle('active')
})

document.addEventListener('click', function(e) {
    if (!hamburgerMenuButton.contains(e.target) && !hamburgerListMenu.contains(e.target)) {
        hamburgerListMenu.classList.remove('active')
    }
})

let eyeLoginSlash = document.getElementById('login-icon-eye-slash')
let eyeLogin = document.getElementById('login-icon-eye')
let loginPassword = document.getElementById('loginPassword')
let eyeRegisterSlash = document.getElementById('register-icon-eye-slash')
let eyeRegister = document.getElementById('register-icon-eye')
let RegisterPassword = document.getElementById('registerPassword')
let eyeSlashConfirm = document.getElementById('password-confirm-icon-eye-slash')
let eyeConfirm = document.getElementById('password-confirm-icon-eye')
let inputPasswordConfirmType = document.getElementById('password-confirm')

eyeLoginSlash.addEventListener('click', function () {
    eyeLoginSlash.style.display = 'none'
    eyeLogin.style.display = 'block'
    loginPassword.type = 'text'
})

eyeLogin.addEventListener('click', function () {
    eyeLogin.style.display = 'none'
    eyeLoginSlash.style.display = 'block'
    loginPassword.type = 'password'
})

eyeRegisterSlash.addEventListener('click', function () {
    eyeRegisterSlash.style.display = 'none'
    eyeRegister.style.display = 'block'
    RegisterPassword.type = 'text'
})

eyeRegister.addEventListener('click', function () {
    eyeRegister.style.display = 'none'
    eyeRegisterSlash.style.display = 'block'
    RegisterPassword.type = 'password'
})

eyeSlashConfirm.addEventListener('click', function () {
    eyeSlashConfirm.style.display = 'none'
    eyeConfirm.style.display = 'block'
    inputPasswordConfirmType.type = 'text'
})

eyeConfirm.addEventListener('click', function () {
    eyeConfirm.style.display = 'none'
    eyeSlashConfirm.style.display = 'block'
    inputPasswordConfirmType.type = 'password'
})