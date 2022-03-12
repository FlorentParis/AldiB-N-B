const buttonsWrapper = document.querySelectorAll(".arrow");
const carousel = document.querySelector(".carousel-contain");

buttonsWrapper[0].addEventListener("click", () => {
    console.log('test');
    if(carousel.style.transform == "translateX(-50.3%)") {
        carousel.style.transform = "translateX(0%)";
    }else {
        carousel.style.transform = "translateX(-50.3%)";
    }
});

buttonsWrapper[1].addEventListener("click", () => {
    console.log('test');
    if(carousel.style.transform == "translateX(-50.3%)") {
        carousel.style.transform = "translateX(0%)";
    }else {
        carousel.style.transform = "translateX(-50.3%)";
    }
});