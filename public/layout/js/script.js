let hamburgerMenu = document.getElementById('hamburger-menu')
let sidebar = document.getElementById('sidebar')

hamburgerMenu.addEventListener('click', function(e) {
    e.preventDefault()
    sidebar.classList.toggle('slide')
})

document.addEventListener('click', function (e) {
    if (!hamburgerMenu.contains(e.target) && !sidebar.contains(e.target)) {
        sidebar.classList.remove('slide')
    }
})