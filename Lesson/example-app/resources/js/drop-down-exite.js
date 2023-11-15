let menuBtn = document.querySelector('.img-exit');
let menu = document.querySelector('.block-excite');
menuBtn.addEventListener('click', function(){
    menuBtn.classList.toggle('block-excite-show');
    menu.classList.toggle('block-excite-show');
})

document.addEventListener('click', function(event){
    if(!event.target.closest('.img-exit') && !event.target.closest('.block-excite')){
        menuBtn.classList.remove('block-excite-show');
        menu.classList.remove('block-excite-show');
    }
});
