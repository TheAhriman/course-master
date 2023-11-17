let menuBtn = document.querySelector('.reg-user-content-profile-image');
let menu = document.querySelector('.drop-down-reg-user');
let arrow = document.querySelector('.profile-drop-arrow')

menuBtn.addEventListener('click', function () {
    menuBtn.classList.toggle('drop-down-reg-user-show');
    menu.classList.toggle('drop-down-reg-user-show');
    arrow.classList.toggle('profile-drop-arrow-active');
})

document.addEventListener('click', function (event) {
    if (!event.target.closest('.reg-user-content-profile-image') && !event.target.closest('.drop-down-reg-user') && !event.target.closest('profile-drop-arrow')) {
        menuBtn.classList.remove('drop-down-reg-user-show');
        menu.classList.remove('drop-down-reg-user-show');
        menu.classList.remove('profile-drop-arrow-active')
    }
});
