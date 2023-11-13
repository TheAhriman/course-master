window.onload = function () {
    let box=document.getElementsByClassName('card-course-step');
    let btn = document.getElementById('button-more');
    for (let i=3;i<box.length;i++) {
        box[i].style.display = "none";
    }

    let countD = 3;
    btn.addEventListener("click", function() {
        let box = document.getElementsByClassName('card-course-step');
        countD += 3;
        if (countD <= box.length){
            for(let i=0;i<countD;i++){
                box[i].style.display = "block";
            }
        }

    })
}
