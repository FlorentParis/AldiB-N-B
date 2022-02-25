<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="card-group">
        <?php while (have_posts()) : ?>

            <?php the_post(); ?>

            <div>
                <h5 class="card-title"><?php the_title(); ?></h5>
                <a href="http://localhost:5555/articles">Articles</a>
            </div>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>