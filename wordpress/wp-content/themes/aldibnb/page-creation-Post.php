<?php get_header('classic'); ?>

<h3>Formulaire création d'un post</h3>
<div>
    <form id="formulaire_post" method="post"
          action ="http://localhost:5555/wp-admin/admin-post.php"
          enctype="multipart/form-data">

        <!-- TODO ajouter la liste des catégories
         -->
        <label for='post_logement'> Catégorie </label>
        <select name="post_logement" id ="post_logement">
            <?php
            $terms = get_terms(['taxonomy' => 'logement']);
            foreach ($terms as $term): ?>
            <option value="<?php $term->term_id; ?>"><?= $term->name; ?></option>
            <?php endforeach;?>
        </select>

        <label for="post_title"> Titre du post </label>
        <input type="text" name="post_title" id="post_title"><br>

        <label for="message_post"> Message du post </label><br>
        <textarea name="message_post" id="message_post" cols="30" rows="10"></textarea><br>

        <label for="post_price"> Prix par nuit </label>
        <input type="number" name="post_price" id="post_price"><br>

        <label for=""></label>

        <label for="post_image">Image</label>
        <input type="file" name="post_image" id="post_image" multiple="false"/>

        <input type="hidden" name="action" value="upload_post">
        <?php wp_nonce_field('upload_post', 'upload_post_nonce');?>

        <button type="submit">Publier</button>
    </form>
</div>

<?php get_footer(); ?>