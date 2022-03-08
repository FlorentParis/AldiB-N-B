<?php get_header('catalog'); ?>

<?php
$tags = ["Balcon", "Parking sous terrain", "Piscine", "Mer", "Accepte les animaux", "Terrasse", "Cuisine", "Jacuzzi"];

$rentals = [
    [
        "titre" => "Appartement Nice avec balcon et vue directe sur la mer",
        "photo" => "/wp-content/themes/aldibnb/assets/img/Appart5.png",
        "lit" => 2,
        "pieces" => 4,
        "chambres" => 2,
        "description" => "Cet appartement de 61 m2  vous propose une vue directe sur la mer depuis son balcon orienté ouest proposant ainsi de beaux couchés de soleil. L’appartement est équipé d’une salle de bain avec baignoire, d’une cuisine équipée ainsi que d’une place de parking qui vous est réservée. À 100 mètres de la mer et des commerces, vous pourrez …",
        "prix" => "97€",
        "note" => 4.81
    ],
    [
        "titre" => "Appartement à paris, 11e arrondissement",
        "photo" => "/wp-content/themes/aldibnb/assets/img/Appart3.png",
        "lit" => 1,
        "pieces" => 3,
        "chambres" => 1,
        "description" => "Cet appartement de 61 m2  vous propose une vue directe sur la mer depuis son balcon orienté ouest proposant ainsi de beaux couchés de soleil. L’appartement est équipé d’une salle de bain avec baignoire, d’une cuisine équipée ainsi que d’une place de parking qui vous est réservée. À 100 mètres de la mer et des commerces, vous pourrez …",
        "prix" => "152€",
        "note" => 4.11
    ]
]
?>

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
    <div class="tags-used">
        <?php foreach($tags as $tag): ?>
            <div class="tag">
                <span><?= $tag ?></span>
                <img src="/wp-content/themes/aldibnb/assets/icons/cross.svg"/>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="rentals-list">
<?php /*$loop = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => '10' ) ); ?>
<?php if ($loop->have_posts()) : ?>
<div class="card-group">
    <?php while ($loop->have_posts()) : ?>

        <?php $loop->the_post(); ?>

        <div class="card">
            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
            <div class="card-body">

                <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                    <div class="alert alert-primary" role="alert">
                        Contenu Sponso
                    </div>
                <?php endif; ?>

                <h5 class="card-title"><?php the_title(); ?></h5>

                <p><small> Style: <?= the_terms(get_the_ID(), 'style'); ?></small></p>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <p class="card-text"><?php the_content(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
            </div>
        </div>

    <?php endwhile; */?>

    <?php foreach($rentals as $rental): ?>
        <div class="single-rental">
            <div class="photos">
                <img src="/wp-content/themes/aldibnb/assets/icons/heart.svg" />
                <img src=<?= $rental["photo"] ?> />
            </div>
            <div class="rental-desc">
                <div><?= $rental["pieces"] ?> pièce(s) • <?= $rental['chambres'] ?> chambre(s) • <?= $rental["lit"] ?> lit(s)</div>
                <span><?= $rental["titre"] ?></span>
                <p><?= $rental["description"] ?></p>
            </div>
            <div class="rental-infos">
                <div>
                    <div class="rental-infos-comments">
                        <span><img src="/wp-content/themes/aldibnb/assets/icons/star.svg"/> <?= $rental["note"] ?></span>
                        <span>(291 commentaires)</span>
                    </div>
                    <div class="rental-infos-price">
                        <span><?= $rental["prix"] ?> / nuit</span>
                        <span>(485€ au total)</span>
                    </div>
                </div>
                <button>
                    En savoir plus
                </button>
            </div>
        </div>
    <?php endforeach; ?>
    <button>En voir plus</button>
</div>

    <?= wpheticPaginate() ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>

