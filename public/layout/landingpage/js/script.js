$(document).ready(function () {
    $('.preloader').delay('1500').fadeOut()
})

let profileMobile = document.getElementById('profile-mobile')
let profileMobileMenu = document.getElementById('profile-menu')
let sidebar = document.getElementById('sidebar')

profileMobile.addEventListener('click', function () {
    profileMobileMenu.classList.toggle('active')
})

document.addEventListener('click', function (e) {
    if(!profileMobile.contains(e.target) && !profileMobileMenu.contains(e.target)) {
        profileMobileMenu.classList.remove('active')
    }
})