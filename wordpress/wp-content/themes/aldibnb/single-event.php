<?php 
    get_headers(); 
?>

<?php while (have_posts()) : the_post(); ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid rounded-start" alt="Event image">
            </div>
            <div class="col-mid-8">
                <div class="card-body">
                    <h5 class="card-body"><?php the_title(); ?></h5>
                    <p class="card-text"><?php the_content(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn bt,-secondary">Acheter :
                        <?= get_post_meta(get_the_ID(), 'event_prix', true); ?>€</a>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>