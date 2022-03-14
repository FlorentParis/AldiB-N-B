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

            <div class="content-input">
                <div>
                    <label for="post_title"> Nom de votre location </label>
                    <input type="text" name="post_title" id="post_title" placeholder="EX. Appartement Parisien vue sur la tour eiffel">
                </div>
                <div>
                    <label for="location"> Ville de votre location </label>
                    <input type="text" name="location" id="location" placeholder="EX. Paris, Marseille, Nantes...">
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

            <span>Description</span>

            <textarea name="message_post" id="message_post" cols="30" rows="10" placeholder="Mettez en avant votre location"></textarea>

            <span>Ajouter des filtres</span>

            <div id="btn-creation-post-filter">
                <span>Ajouter</span>
            </div>

            <input type="hidden" name="action" value="upload_post">
            <?php wp_nonce_field('upload_post', 'upload_post_nonce');?>

            <button type="submit">Postez votre annonce</button>

            <section id="modalFilters">
                <div class="modalFilterContainer">
                    <img src="/wp-content/themes/aldibnb/assets/icons/cross-blue.svg" id="modal-filters-close">
                    <div class="title">Filtres</div>
                    <div class="list-filters">
                        <span>Type de logement</span>
                        <div>
                            <div class="tag">
                                <input name="appartements" id="appartements" type="checkbox">
                                <span>Appartements</span>
                            </div>
                            <div class="tag">
                                <input name="Maisons" id="Maisons" type="checkbox">
                                <span>Maisons</span>
                            </div>
                            <div class="tag">
                                <input name="villa" id="villa" type="checkbox">
                                <span>Villa</span>
                            </div>
                            <div class="tag">
                                <input name="dépendance" id="dépendance" type="checkbox">
                                <span>Dépendance</span>
                            </div>
                        </div>
                        <span>Équipements</span>
                        <div>
                            <div class="tag">
                                <input name="wifi" id="wifi" type="checkbox">
                                <span>Wifi</span>
                            </div>
                            <div class="tag">
                                <input name="lave-Linge" id="lave-Linge" type="checkbox">
                                <span>Lave-Linge</span>
                            </div>
                            <div class="tag">
                                <input name="seche-linge" id="seche-linge" type="checkbox">
                                <span>Seche-Linge</span>
                            </div>
                        </div>
                        <span>Installations</span>
                        <div>
                            <div class="tag">
                                <input name="piscine" id="piscine" type="checkbox">
                                <span>Piscine</span>
                            </div>
                            <div class="tag">
                                <input name="cuisine" id="cuisine" type="checkbox">
                                <span>Cuisine</span>
                            </div>
                            <div class="tag">
                                <input name="jacuzzi" id="jacuzzi" type="checkbox">
                                <span>Jacuzzi</span>
                            </div>
                        </div>
                        <span>Règlement intérieur</span>
                        <div>
                            <div class="tag">
                                <input name="logement_fumeur" id="logement_fumeur" type="checkbox">
                                <span>Logement Fumeur</span>
                            </div>
                            <div class="tag">
                                <input name="animaux_acceptés" id="animaux_acceptés" type="checkbox">
                                <span>Animaux Acceptés</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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