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

/* Modal Global */
const modal = document.querySelector(".modal-container");
const cross = document.querySelector("#modal-close");

cross.addEventListener("click", () => {
    modal.style.display = "none";
    modalInsc.style.display = "none";
    modalConnect.style.display = "none";
})

/* Modal Inscription */
const lienInscription = document.querySelector('#inscription-link');
const modalInsc = document.querySelector(".container-inscription");

lienInscription.addEventListener("click", () => {
    modal.style.display = "flex";
    modalInsc.style.display = "block";
})

/* Modal Connexion */
const lienConnexion = document.querySelector("#connexion-link");
const modalConnect = document.querySelector(".container-connexion");

lienConnexion.addEventListener("click", () => {
    modal.style.display = "flex";
    modalConnect.style.display = "block";
})