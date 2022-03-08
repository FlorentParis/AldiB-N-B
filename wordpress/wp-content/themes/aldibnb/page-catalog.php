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
<?php $loop = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => '10' ) ); ?>
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

    <?php endwhile; ?>

</div>

    <?= wpheticPaginate() ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>

