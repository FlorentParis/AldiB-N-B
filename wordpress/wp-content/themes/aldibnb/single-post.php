<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="card mb-3">
            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="Image" />
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text">Prix par nuit :  <?= get_post_meta(get_the_ID(), "post_price", true)?>€ </p>
                <p class="card-text"><?php the_content(); ?></p>
                <p class="card-text"><small class="text-muted">Ecrit le : <?php the_date(); ?></small></p>
                <?php comments_template(); // Par ici les commentaires ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <h2>Pas de posts</h2>
<?php endif; ?>

<?php get_footer(); ?>