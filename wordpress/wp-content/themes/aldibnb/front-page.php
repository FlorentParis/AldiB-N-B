<?php get_header(); ?>

<div class="hero">
    <div class="container-pic">
    </div>
    <div class="container-destination-bar">
        <span>Votre style, votre destination.</span>
        <form class="destination-bar">
            <div class="case">
                <label>Destination</label>
                <input type="text" placeholder="Où voulez-vous aller ?" />
            </div>
            <div class="case">
                <label>Arrivée</label>
                <input type="date" placeholder="De quand ?" />
            </div>
            <div class="case">
                <label>Départ</label>
                <input type="date" placeholder="À quand ?" />
            </div>
            <div class="case">
                <label>Voyageurs</label>
                <input type="number" placeholder="Avec qui ?" />
            </div>
            <button>Réserver</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>