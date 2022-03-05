const navbar = document.getElementById('navbar');
const burger = document.getElementById('burger-content');

window.onscroll = function() {myFunction()};

function myFunction() {
    if(window.scrollY > 300) {
        navbar.style.backgroundColor = "#fff";
        navbar.style.height = "80px";
        navbar.style.boxShadow = "rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
        burger.querySelectorAll('span').forEach(element => {
            element.style.backgroundColor = "#353C6F";
        });
    }else {
        navbar.style.backgroundColor = "transparent";
        navbar.style.height = "136px";
        navbar.style.boxShadow = "none";
        burger.querySelectorAll('span').forEach(element => {
            element.style.backgroundColor = "#fff";
        });
    }
}