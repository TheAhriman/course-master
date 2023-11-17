let lanDrop = document.querySelector('.dropdown-lang');
let langDropContent = document.querySelector('.dropdown-content-lang')

lanDrop.addEventListener('click', function () {
    langDropContent.classList.toggle('dropdown-content-lang-show')
})
