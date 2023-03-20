let hamburgerMenu = document.getElementById('hamburger-menu')
let sidebar = document.getElementById('sidebar')
let login = document.getElementById('login-mobile')
let modal = document.getElementById('modal-mobile')

hamburgerMenu.addEventListener('click', function(e) {
    e.preventDefault()
    sidebar.classList.toggle('slide')
})

document.addEventListener('click', function (e) {
    if (!hamburgerMenu.contains(e.target) && !sidebar.contains(e.target) && !modal.contains(e.target)) {
        sidebar.classList.remove('slide')
    }
})

login.addEventListener('click', function(e) {
    e.preventDefault()
    modal.classList.add('modal-active')
})


modal.addEventListener('click', function() {
    modal.classList.remove('modal-active')
})