<?php get_header('classic'); ?>

<div class="pres-rental-infos">
    <div class="pres-infos-content">
        <div>
            <span class="title"><?= the_title() ?></span>
            <span class="tags"><?= get_post_meta(get_the_ID(), "lit", true) ?> lit • Balcon • Vue sur la mer</span>
        </div>
        <div>
            <span class="note"><img src="/wp-content/themes/aldibnb/assets/icons/star.svg"/><span><?= get_post_meta(get_the_ID(), "note", true) ?></span> <span>(<?= get_comments_number() ?> commentaires )</span></span>
            <span class="price"><span><?= get_post_meta(get_the_ID(), "post_price", true)?>€&nbsp;</span>/ nuit</span>
        </div>
    </div>
</div>
<div class="pres-rental-pics">
    <div class="content-pics">
        <div><img src="/wp-content/themes/aldibnb/assets/icons/heart.svg" /><img src="<?= get_the_post_thumbnail_url()?>" alt=""></div>
        <div>
            <img src="/wp-content/themes/aldibnb/assets/img/Appart1.png" alt="">
        </div>
        <div>
            <img src="/wp-content/themes/aldibnb/assets/img/Appart2.png" alt="">
        </div>
        <div>
            <img src="/wp-content/themes/aldibnb/assets/img/Appart3.png" alt="">
        </div>
        <div>
            <img src="/wp-content/themes/aldibnb/assets/img/Appart4.png" alt="">
        </div>
    </div>
</div>
<div class="pres-rental-container">
    <div>
        <div class="rental-content">
            <div class="rental-host">
                <img src="/wp-content/themes/aldibnb/assets/img/profil/martine.jfif" alt="">
                <div>
                <span>Hote : <?= get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())); ?></span>
                    <div>Membre depuis <?php echo get_the_date(); ?> • <a href="">voir le profil</a></div>
                </div>
            </div>
            <?= the_content() ?>
            <div class="rental-advantages">
                <span>Les points forts de cette destination/location</span>
                <div>
                    <div class="advantage">
                        <div></div>
                        <span>Balcon</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Vue sur la mer</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Proche des commerces</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Salle de bain avec baignoire</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Appartement neuf</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Ambiance/Déco zen</span>
                    </div>
                    <div class="advantage">
                        <div></div>
                        <span>Parking gratuit</span>
                    </div>
                </div>
            </div>
            <div class="rental-comments">
                <div>
                    <span class="note"><img src="/wp-content/themes/aldibnb/assets/icons/star.svg"/><span><?= get_post_meta(get_the_ID(), "note", true) ?></span></span>
                    <span> • </span>
                    <span><?= get_comments_number() ?> commentaires </span>
                </div>
                <div class="appreciations-bars">
                    <div class="appreciation">
                        <span>Rapport qualité-prix</span>
                        <div class="bar"><div></div></div>
                        <span>4.7</span>
                    </div>
                    <div class="appreciation">
                        <span>Accueil</span>
                        <div class="bar"><div></div></div>
                        <span>4.7</span>
                    </div>
                    <div class="appreciation">
                        <span>Emplacement</span>
                        <div class="bar"><div></div></div>
                        <span>4.7</span>
                    </div>
                    <div class="appreciation">
                        <span>Propreté</span>
                        <div class="bar"><div></div></div>
                        <span>4.7</span>
                    </div>
                </div>
            </div>
            <?php comments_template(); ?>
        </div>
        <form class="rental-reserv">
            <div class="reserv-recap">
                <span class="price"><span><?= get_post_meta(get_the_ID(), "post_price", true)?>€&nbsp;</span>/ nuit</span>
                <span class="note"><img src="/wp-content/themes/aldibnb/assets/icons/star.svg"/><span><?= get_post_meta(get_the_ID(), "note", true) ?></span> <span>(<?= get_comments_number() ?> commentaires )</span></span>
            </div>
            <div class="rental-select-choice">
                <div class="date">
                    <div>
                        <label>Arrivée</label>
                        <input type="date">
                    </div>
                    <div>
                        <label>Départ</label>
                        <input type="date">
                    </div>
                </div>
                <div class="number-travelers-container">
                    <span class="title">Nombre de voyageurs :</span>
                    <div class="number-travelers-options">
                        <div>
                            <span class="type-person">Adultes</span>
                            <span class="age-person">13 ans et plus</span>
                        </div>
                        <div>
                            <button>-</button>
                            2
                            <button>+</button>
                        </div>
                    </div>
                    <div class="number-travelers-options">
                        <div>
                            <span class="type-person">Enfants</span>
                            <span class="age-person">De 2 à 12 ans</span>
                        </div>
                        <div>
                            <button>-</button>
                            0
                            <button>+</button>
                        </div>
                    </div>
                    <div class="number-travelers-options">
                        <div>
                            <span class="type-person">Bébés</span>
                            <span class="age-person">- de 2 ans</span>
                        </div>
                        <div>
                            <button>-</button>
                            1
                            <button>+</button>
                        </div>
                    </div>
                    <div class="number-travelers-options">
                        <div>
                            <span class="type-person">Animaux de compagnie</span>
                        </div>
                        <div>
                            <button>-</button>
                            1
                            <button>+</button>
                        </div>
                    </div>
                </div>
            </div>
            <button>Je réserve !</button>
            <div class="title-recap">Détails de votre séjour</div>
            <div class="price-recap">
                <span><?= get_post_meta(get_the_ID(), "post_price", true)?>€ x 5 nuits</span>
                <span>
                    <?php
                        $oneNight = get_post_meta(get_the_ID(), "post_price", true);
                        $price =  $oneNight * 5;
                        echo $price
                     ?> €
                </span>
            </div>
            <div class="price-recap">
                <span>Promotion ou réduction (longue durée)</span>
                <span>-20€</span>
            </div>
            <div class="price-recap">
                <span>Frais de service</span>
                <span>Offerts</span>
            </div>
            <div class="price-recap">
                <span>Taxes de séjour</span>
                <span>9€</span>
            </div>
            <div class="total">
                <span>Total</span>
                <span>
                    <?php
                         echo $price - 11
                    ?>€
                </span>
            </div>
        </form>
    </div>
</div>

<?php get_footer(); ?>