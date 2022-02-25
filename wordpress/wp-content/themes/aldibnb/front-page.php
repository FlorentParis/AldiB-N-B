<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="card-group">
        <?php while (have_posts()) : ?>

            <?php the_post(); ?>

            <div>
                <h5 class="card-title"><?php the_title(); ?></h5>
            </div>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>