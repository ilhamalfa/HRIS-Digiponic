let eyeSlash = document.getElementById('password-icon-eye-slash')
let eyeSlashConfirm = document.getElementById('password-confirm-icon-eye-slash')
let eye = document.getElementById('password-icon-eye')
let eyeConfirm = document.getElementById('password-confirm-icon-eye')
let inputPasswordType = document.getElementById('password')
let inputPasswordConfirmType = document.getElementById('password-confirm')

$(document).ready(function () {
    $('.preloader').delay('1500').fadeOut();
})

eyeSlash.addEventListener('click', function () {
    eyeSlash.style.display = 'none'
    eye.style.display = 'block'
    inputPasswordType.type = 'text'
})

eyeSlashConfirm.addEventListener('click', function () {
    eyeSlashConfirm.style.display = 'none'
    eyeConfirm.style.display = 'block'
    inputPasswordConfirmType.type = 'text'
})

eye.addEventListener('click', function () {
    eye.style.display = 'none'
    eyeSlash.style.display = 'block'
    inputPasswordType.type = 'password'
})

eyeConfirm.addEventListener('click', function () {
    eyeConfirm.style.display = 'none'
    eyeSlashConfirm.style.display = 'block'
    inputPasswordConfirmType.type = 'password'
})
