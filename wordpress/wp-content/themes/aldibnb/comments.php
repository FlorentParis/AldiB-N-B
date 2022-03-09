<div id="commentaires" class="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php echo get_comments_number(); // Nombre de commentaires ?> Commentaire(s)
        </h2>

        <ul class="comment__list">
            <?php
            // La fonction qui liste les commentaires
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ) );
            ?>
        </ul>

    <?php
    // S'il n'y a pas de commentaires
    else :
        ?>
        <p class="comments-none">
            Il n'y a pas de commentaires pour le moment. Soyez le premier à participer !
        </p>
    <?php endif; ?>

    <?php comment_form(); // Le formulaire d'ajout de commentaire ?>
</div>