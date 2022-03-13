<?php get_header('catalog');

$rentals = [];
if (have_posts()) :
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
endif;

$args = array(
    'hide_empty' => false, 
);
$terms = get_terms(['taxonomy' => 'logement'], $args);

/* $tags = ["Balcon", "Parking sous terrain", "Piscine", "Mer", "Accepte les animaux", "Terrasse", "Cuisine", "Jacuzzi"];
 */
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
            <?php
            $terms2 = get_terms(['taxonomy' => 'logement'], $args);
            ?>
            <select>
                <?php
                foreach ($terms2 as $term2) {
                    $active = get_query_var('logement') === $term2->slug ? active : '';
                    ?>
                    <option><?=$term2->name?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <button>
            <img src="/wp-content/themes/aldibnb/assets/icons/search.svg" />
        </button>
    </form>
    <div class="tags-used">
        <?php
            $terms2 = get_terms(['taxonomy' => 'logement'], $args);
            foreach ($terms2 as $term2) {
                $active = get_query_var('logement') === $term2->slug ? active : '';
                echo '<a class="list-group-item list-group-item-action'. $active .'"
                href="' . get_term_link($term2) . '">' . $term2->name . '</a>';
            }
        ?>
    </div>
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