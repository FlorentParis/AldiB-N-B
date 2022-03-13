const cPostFiltres = document.querySelector("#btn-creation-post-filter");
const cPostModalFilters = document.querySelector("#modalFilters");
const cPostModalFiltersClose = document.querySelector('#modal-filters-close');

cPostFiltres.addEventListener("click", () => {
    console.log("test");
    if(cPostModalFilters.style.display == "flex") {
        cPostModalFilters.style.display = "none";
    }else{
        cPostModalFilters.style.display = "flex";
    }
})

cPostModalFiltersClose.addEventListener("click", () => {
    cPostModalFilters.style.display = "none";
})