<?php get_header();

$cities = [
    [
        "name" => "Paris",
        "pic" => "wp-content/themes/aldibnb/assets/img/Paris1.png",
        "desc" => "Découvrez ou re-découvrez Paris et ses nombreux monuments à visiter en toutes saisons."
    ],
    [
        "name" => "Lille",
        "pic" => "wp-content/themes/aldibnb/assets/img/Lille.png",
        "desc" => "Seul ou à plusieurs, venez goûter aux délices culinaires de Lille. Saveur et gourmandise garanties !"
    ],
    [
        "name" => "Bordeaux",
        "pic" => "wp-content/themes/aldibnb/assets/img/Bordeaux1.png",
        "desc" => "De printemps ou d’hiver, De longues et agréables ballades vous attendent à Bordeaux."
    ],
    [
        "name" => "Marseille",
        "pic" => "wp-content/themes/aldibnb/assets/img/Marseille1.png",
        "desc" => "Venez visiter le vieux port de Marseille. Ses habitants sauront vous accueillir à bras ouverts."
    ],
    [
        "name" => "Lyon",
        "pic" => "wp-content/themes/aldibnb/assets/img/Lyon.png",
        "desc" => "Besoin de retrouver du calme et de vous ressourcer ? Lyon est la destination parfaite pour vous."
    ],
    [
        "name" => "Saint-Malo",
        "pic" => "wp-content/themes/aldibnb/assets/img/Saint-Malo.png",
        "desc" => "Venez vous ressourcer et profiter de l’air frais de Saint-Malo, ville pleine d’histoire."
    ]
]
?>

<div class="hero">
    <div class="container-pic">
    </div>
    <div class="container-destination-bar">
        <span>Votre style, votre destination.</span>
        <form class="destination-bar" method="post" action ="http://localhost:5555/wp-admin/admin-post.php" enctype="multipart/form-data">
            <div class="case">
                <label>Destination</label>
                <input name="location" id="location" type="text" placeholder="Où voulez-vous aller ?" />
            </div>
            <div class="case">
                <label>Départ</label>
                <input type="date" placeholder="De quand ?" />
            </div>
            <div class="case">
                <label>Arrivée</label>
                <input type="date" placeholder="À quand ?" />
            </div>
            <div class="case">
                <label>Voyageurs</label>
                <input name="voyageurs" id="voyageurs" type="number" placeholder="Avec qui ?" />
            </div>
            <input type="hidden" name="action" value="search_post">
            <button type="submit"><img src="wp-content/themes/aldibnb/assets/icons/search.svg" /></button>
        </form>
    </div>
</div>
<div class="popular-rentals">
    <span class="title">Les destinations/locations les plus populaires</span>
    <div class="container-popular-rentals">
        <?php
        $posts = new WP_Query( 'posts_per_page=2' );
        //var_dump(get_the_ID());
        if($posts->have_posts()):
            while ($posts->have_posts()) : $posts->the_post();?>
                <div class="rental-case">
                    <div class="rental-pic" style="background-image: url(<?= get_the_post_thumbnail_url()?>)">
                        <img src="wp-content/themes/aldibnb/assets/icons/heart.svg" />
                    </div>
                    <div class="rental-infos">
                        <span><?=get_post_meta(get_the_ID(), "piece", true); ?> pièces ~ <?= get_post_meta(get_the_ID(), "chambre", true)  ?> chambres</span>
                    </div>
                    <div class="rental-title"><?= the_title() ?></div>
                </div>
            <?php endwhile;
        endif;?>
    </div>
    <button onclick="location.href='http://localhost:5555/catalog'" type="button">En voir plus</button>
</div>
<div class="surprise-destination">
    <p>Laissez-vous surprendre par notre destination mystère sélectionnée rien que pour vous.</p>
    <button>Surprenez-moi !</button>
</div>
<div class="choice-destination">
    <span class="title">Choisissez la ville que vous souhaitez visiter</span>
    <div class="carousel">
        <div class="arrow">
            <img src="wp-content/themes/aldibnb/assets/icons/arrow-l.png" />
        </div>
        <div class="carousel-wrapper">
            <div class="carousel-contain">
                <?php foreach($cities as $city): ?>
                    <div class="carousel-part">
                        <img src="<?= $city['pic'] ?>" />
                        <div>
                            <span><?= $city["name"] ?></span>
                            <span><?= $city["desc"] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="arrow">
            <img src="wp-content/themes/aldibnb/assets/icons/arrow-r.png" />
        </div>
    </div>
</div>

<?php get_footer(); ?>