$(document).ready(function () {
    $('.preloader').delay('1500').fadeOut()
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


$(window).scroll(function () { 
    let wScroll = $(this).scrollTop()

    if (wScroll > 100) {
        $('.about').addClass('fade');

        $('.opening').addClass('fade');

        if (wScroll > 300) {
            $('.about .title-1').css({
                'transform': 'translateX(-' + (wScroll - 300)  + 'px)'
            });
            $('.about .title-2').css({
                'transform': 'translateX(' + (wScroll - 300) + 'px)'
            });
        }

        if (wScroll > 1200) {
            $('.about .background-color').css({
                'opacity': '50%',
                'transition': '.2s',
            });
        } else {
            $('.about .background-color').css({
                'opacity': '1',
            });
        }

        if (wScroll > 1300) {
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

        if (wScroll > $('.product-introduction').offset().top - 100) {
            $('.product-introduction .title').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            });
            $('.product-introduction .description').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            });
            $('.product-introduction .project-link').css({
                'opacity': '1',
            });
            setTimeout(function() {
                $('.product-introduction .button').css({
                    'opacity': '1',
                });
            }, 500);
        } 
            
        if (wScroll > $('.product-introduction').offset().top - 600) {
            $('.about .background-color').css({
                'opacity': '80%',
            });
            $('.about .description').css({
                'opacity': '0',
            });
            $('.about .button').css({
                'opacity': '0',
            });
        }

        if (wScroll > $('.product-introduction').offset().top) {
            $('.topbar').css({
                'background-color': 'black',
            });
            $('.about').css({
                'opacity': '0',
            });
        } else {
            $('.about').css({
                'opacity': '1',
            });
            $('.topbar').css({
                'background': 'none',
            });
        }

        if (wScroll > $('.product').offset().top - 200) {
            $('.about .description').css({
                'z-index': '-999',
            });
            $('.product .description').css({
                'opacity': '1',
            });
            $('.product .image').css({
                'opacity': '1',
                'transform': 'translateY(0)',
            });
            setTimeout(function() {
                $('.product .button-buy-box').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                });
            }, 500);
            setTimeout(function() {
                $('.product .button-watch-box').css({
                    'opacity': '1',
                    'transform': 'translateX(0)',
                });
            }, 500);
        } else {
            $('.about .description').css({
                'z-index': '998',
            });
        }

        if (wScroll > $('.team').offset().top - 500) {
            $('.team .title').css({
                'opacity': '1',
            });
            $('.team .span-1').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            });
            $('.team .span-2').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            });
            $('.team .bg-text-1').css({
                'opacity': '20%',
                'transform': 'translateX(0)',
            });
            $('.team .bg-text-2').css({
                'opacity': '20%',
                'transform': 'translateX(0)',
            });
            $('.team .bg-text-3').css({
                'opacity': '20%',
                'transform': 'translateX(0)',
            });
            $('.team .element').css({
                'opacity': '1',
                'transform': 'translateY(0)',
            });
        } 

        if (wScroll > $('.career').offset().top - 500) {
            $('.career .title').css({
                'opacity': '1',
                'transform': 'translateX(0)',
            });
            $('.career .description').css({
                'opacity': '1',
            });
            setTimeout(function() {
                $('.career .button').css({
                    'opacity': '1',
                });
            }, 800);
            $('.career .employee-image').css({
                'opacity': '1',
                'transform': 'translateY(0)',
            });
        }

    } else {
        $('.about').removeClass('fade');
        $('.opening').removeClass('fade');
    }
});