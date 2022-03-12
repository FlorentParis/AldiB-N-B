<?php get_header('classic'); ?>

<!-- TODO ajouter la liste des catégories -->


<div class="creation-post-content">
    <div>
        <form id="formulaire_post" method="post"
            action ="http://localhost:5555/wp-admin/admin-post.php"
            enctype="multipart/form-data" class="form-post">

            <p>Votre location</p>

            <div class="image-input">
                <input type="file" name="post_image" id="post_image" multiple="false"/>
            </div>

            <span>Informations</span>

            <div class="input">
                <label for='post_logement'> Type de location </label>
                <select name="post_logement" id ="post_logement">
                    <?php
                    $args = array(
                        'hide_empty' => false, 
                    );
                    $terms = get_terms(['taxonomy' => 'logement'], $args);
                    foreach ($terms as $term): ?>
                    <option value="<?=$term->term_id; ?>"><?= $term->name; ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="content-input">
                <div>
                    <label for="post_title"> Nom de votre location </label>
                    <input type="text" name="post_title" id="post_title" placeholder="EX. Appartement Parisien vue sur la tour eiffel">
                </div>
                <div>
                    <label for="post_price"> Prix par nuit </label>
                    <input type="number" name="post_price" id="post_price" placeholder="Ex. 100€">
                </div>
            </div>

            <div class="checkbox-content">
                <input type="checkbox" name="" id="">
                <p>Ajouter une promotion pour séjour de longue durée.</p>
            </div>

            <div class="bar-input">
                <div>
                    <label for="nb_chambre">Nombre de chambres</label>
                    <input type="number" name="nb_chambre" id="nb_chambre" placeholder="EX. 3"/>
                </div>
                <div>
                    <label for="nb_piece">Nombre de pièces</label>
                    <input type="number" name="nb_piece" id="nb_piece" placeholder="EX. 6"/>
                </div>
                <div>
                    <label for="nb_lit">Nombre de lits</label>
                    <input type="number" name="nb_lit" id="nb_lit" placeholder="EX. 4"/>
                </div>
            </div>

            <div class="checkbox-content p-0">
                <input type="checkbox" name="" id="">
                <p>Autoriser les animaux.</p>
            </div>

            <span>Description</span>

            <textarea name="message_post" id="message_post" cols="30" rows="10" placeholder="Mettez en avant votre location"></textarea>

            <span>Ajouter des filtres</span>

            <div class="input">
                <label for="">Séparez vos filtres par des ,</label>
                <input type="text" name="" id="" placeholder="EX. Balcon, piscine, montagne ...">
            </div>

            <input type="hidden" name="action" value="upload_post">
            <?php wp_nonce_field('upload_post', 'upload_post_nonce');?>

            <button type="submit">Postez votre annonce</button>
        </form>
        <div class="location-taken">
            <p>Choisissez les dates où vous ne voulez pas que votre location soit louée</p>
            <div class="bar-input">
                <div>
                    <label for="">Date de début</label>
                    <input type="date">
                </div>
                <div>
                    <label for="">Date de fin</label>
                    <input type="date">
                </div>
                <button>Annuler</button>
            </div>
            <div class="bar-input">
                <div>
                    <label for="">Date de début</label>
                    <input type="date">
                </div>
                <div>
                    <label for="">Date de fin</label>
                    <input type="date">
                </div>
                <button>Valider</button>
            </div>
            <button>Ajouter des dates</button>
        </div>
    </div>
</div>

<?php get_footer(); ?>