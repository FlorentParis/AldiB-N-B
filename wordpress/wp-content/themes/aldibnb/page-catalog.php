<?php get_header('catalog'); ?>

<div class="search-bar">
    <form>
        <div class="search-case">
            <label>Destination</label>
            <input type="text" placeholder="Où voulez-vous aller ?"/>
        </div>
        <div class="search-case">
            <label>Départ</label>
            <input type="date" />
        </div> 
        <div class="search-case">
            <label>Arrivée</label>
            <input type="date" />
        </div> 
        <div class="search-case">
            <label>Adultes</label>
            <input type="number" placeholder="Combien ?"/>
        </div> 
        <div class="search-case">
            <label>Enfants</label>
            <input type="number" placeholder="Combien ?"/>
        </div>
        <div class="search-case">
            <label>Ajouter des filtres</label>
            <input type="text" placeholder="Piscine, balcon …"/>
        </div>
        <button>
            <img src="/wp-content/themes/aldibnb/assets/icons/search.svg" />
        </button>
    </form>
</div>
<div class="rentals-list">

</div>

<?php get_footer(); ?>