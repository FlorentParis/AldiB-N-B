const filtres = document.querySelectorAll(".search-case")[5];
const modalFilters = document.querySelector("#modalFilters");
const modalFiltersClose = document.querySelector('#modal-filters-close');

filtres.addEventListener("click", () => {
    if(modalFilters.style.display == "flex") {
        modalFilters.style.display = "none";
    }else{
        modalFilters.style.display = "flex";
    }
})

modalFiltersClose.addEventListener("click", () => {
    modalFilters.style.display = "none";
})