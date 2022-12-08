const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");

//  class bullets
const bullets = document.querySelectorAll(".bullets span");
// class image
const images = document.querySelectorAll(".image ");

inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });

    inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
    });
});

toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});

function moveSlider()
{

    let index = this.dataset.value; //mengambil data-value pada bullets html di login.html
    
    //mengambil image dari data-value pada bullets login.html
    let currentImage = document.querySelector(`.img-${index}`); 
    images.forEach((bull) => bull.classList.remove("show"));
    currentImage.classList.add("show");
    //end

    // mengambil title berdasarkan image
    const textSlider = document.querySelector(".text-group");
    textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;
    // end

    bullets.forEach(bull => bull.classList.remove("active"));
    this.classList.add("active");
}

bullets.forEach((bullet) => {
    bullet.addEventListener("click", moveSlider);
});