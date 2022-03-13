<?php 
get_header('catalog');
$rentals = [];

if($_SESSION["args"] != 0){
    $postslist = get_posts($_SESSION["args"]);
    foreach($postslist as $post){
        $container = [
            "titre" => get_the_title(),
            "photo" => get_the_post_thumbnail_url(),
            "lit" => get_post_meta(get_the_ID(), "lit", true),
            "pieces" => get_post_meta(get_the_ID(), "piece", true),
            "chambres" => get_post_meta(get_the_ID(), "chambre", true),
            "description" => get_the_content(),
            "prix" => get_post_meta(get_the_ID(), "post_price", true),
            "note" => get_post_meta(get_the_ID(), "note", true),
            "url" => get_the_permalink()
        ];
        array_push($rentals, $container);
    }
}elseif (have_posts()) {
    while (have_posts()) :
        the_post();
        $container = [
            "titre" => get_the_title(),
            "photo" => get_the_post_thumbnail_url(),
            "lit" => get_post_meta(get_the_ID(), "lit", true),
            "pieces" => get_post_meta(get_the_ID(), "piece", true),
            "chambres" => get_post_meta(get_the_ID(), "chambre", true),
            "description" => get_the_content(),
            "prix" => get_post_meta(get_the_ID(), "post_price", true),
            "note" => get_post_meta(get_the_ID(), "note", true),
            "url" => get_the_permalink()
        ];
        array_push($rentals, $container);
    endwhile;
}
unset($_SESSION['args']);
$args = array(
    'hide_empty' => false, 
);

$terms = get_terms(['taxonomy' => 'logement'], $args);


/* $tags = ["Balcon", "Parking sous terrain", "Piscine", "Mer", "Accepte les animaux", "Terrasse", "Cuisine", "Jacuzzi"]; */
?>

<div class="search-bar">
    <form id="formulaire_post" method="post" action ="http://localhost:5555/wp-admin/admin-post.php" enctype="multipart/form-data">
        <section id="modalFilters">
            <div class="modalFilterContainer">
                <img src="/wp-content/themes/aldibnb/assets/icons/cross-blue.svg" id="modal-filters-close">
                <div class="title">Filtres</div>
                <div class="list-filters">
                    <span>Type de logement</span>
                    <div>
                        <div class="tag">
                            <input name="appartements" id="appartements" type="checkbox">
                            <span>Appartements</span>
                        </div>
                        <div class="tag">
                            <input name="maison" id="maison" type="checkbox">
                            <span>Maison</span>
                        </div>
                        <div class="tag">
                            <input name="villa" id="villa" type="checkbox">
                            <span>Villa</span>
                        </div>
                        <div class="tag">
                            <input name="dépendance" id="dépendance" type="checkbox">
                            <span>Dépendance</span>
                        </div>
                    </div>
                    <span>Équipements</span>
                    <div>
                        <div class="tag">
                            <input name="wifi" id="wifi" type="checkbox">
                            <span>Wifi</span>
                        </div>
                        <div class="tag">
                            <input name="lave-Linge" id="lave-Linge" type="checkbox">
                            <span>Lave-Linge</span>
                        </div>
                        <div class="tag">
                            <input name="seche-linge" id="seche-linge" type="checkbox">
                            <span>Seche-Linge</span>
                        </div>
                    </div>
                    <span>Installations</span>
                    <div>
                        <div class="tag">
                            <input name="piscine" id="piscine" type="checkbox">
                            <span>Piscine</span>
                        </div>
                        <div class="tag">
                            <input name="cuisine" id="cuisine" type="checkbox">
                            <span>Cuisine</span>
                        </div>
                        <div class="tag">
                            <input name="jacuzzi" id="jacuzzi" type="checkbox">
                            <span>Jacuzzi</span>
                        </div>
                    </div>
                    <span>Règlement intérieur</span>
                    <div>
                        <div class="tag">
                            <input name="logement_fumeur" id="logement_fumeur" type="checkbox">
                            <span>Logement Fumeur</span>
                        </div>
                        <div class="tag">
                            <input name="animaux_acceptés" id="animaux_acceptés" type="checkbox">
                            <span>Animaux Acceptés</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="search-case">
            <label>Destination</label>
            <input name="location" id="location" type="text"  placeholder="Où voulez-vous aller ?"/>
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
            <input name="adultes" id="adultes" type="number" placeholder="Combien ?"/>
        </div> 
        <div class="search-case">
            <label>Enfants</label>
            <input name="enfants" id="enfants" type="number" placeholder="Combien ?"/>
        </div>
        <div class="search-case">
            <label>Ajouter des filtres</label>
            <span>Ajouter</span>
        </div>
        <input type="hidden" name="action" value="search_post">
        <button type="submit">
            <img src="/wp-content/themes/aldibnb/assets/icons/search.svg" />
        </button>
    </form>
    <a href="http://localhost:5555/catalog/">Supprimer les filtres</a>
</div>
<div class="rentals-list">
    <?php foreach($rentals as $rental): ?>
        
        <div class="single-rental">
            <div class="photos">
                <img src="/wp-content/themes/aldibnb/assets/icons/heart.svg" />
                <img src=<?= $rental["photo"] ?> />
            </div>
            <div class="rental-desc">
                <div><?= $rental["pieces"] ?> pièce(s) • <?= $rental['chambres'] ?> chambre(s) • <?= $rental["lit"] ?> lit(s)</div>
                <span><?= $rental["titre"] ?></span>
                <?= $rental["description"] ?>
            </div>
            <div class="rental-infos">
                <div>
                    <div class="rental-infos-comments">
                        <span><img src="/wp-content/themes/aldibnb/assets/icons/star.svg"/> <?= $rental["note"] ?></span>
                        <span>(<?= get_comments_number() ?> commentaires)</span>
                    </div>
                    <div class="rental-infos-price">
                        <span><?= $rental["prix"] ?>€ / nuit</span>
                        <span>(485€ au total)</span>
                    </div>
                </div>
                <button onclick="window.location=`<?php echo $rental['url'] ?>`;" >
                    En savoir plus                    
                </button>
            </div>
        </div>
    <?php endforeach; ?>
    <button>En voir plus</button>

</div>
<div class="surprise-destination" style="margin-bottom: 30px;">
    <p>Vous n'avez pas trouvé votre appartement/location/destination idéale ? </br>
        Pas de soucis, nous avons LA solution/destination qu'il vous faut !</p>
    <button>Surprenez-moi !</button>
</div>

<?php get_footer(); ?>