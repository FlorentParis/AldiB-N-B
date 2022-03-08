<?php get_header(); ?>

<div class="mt-3 mb-3">
    <h3>Catégories</h3>
    <ul class="list-group list-group-horizontal text-center">
        <?php
        $terms = get_terms(['taxonomy' => 'style']);
        foreach ($terms as $term) {
            $active = get_query_var('style') === $term->slug ? active : '';
            echo '<a class="list-group-iteù list-item-action'. $active .'
            "href="' . get_term_link($term) . '">' . $term->name . '</a>';
        }; ?>
</div>


<?php if (have_posts()) : ?>
<div class="card-group">
    <?php while (have_posts()) : ?>

        <?php the_post(); ?>

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

<?php get_footer(); ?>
