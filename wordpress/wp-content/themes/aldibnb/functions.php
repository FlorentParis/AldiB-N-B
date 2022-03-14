<?php 
session_start();

function wphetic_theme_support() {
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
}

function wphetic_bootstrap() 
{
    /* Bootstrap */
    wp_enqueue_style('bootstrap_css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap_js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', 
    [], false, true);

    /* Perso Style */
    wp_enqueue_style('style_perso', get_template_directory_uri() . '/assets/style/main.css', array(), '1.0', 'all');
    /* Perso Script Components */
    wp_enqueue_script('script_navbar',
    get_template_directory_uri() . '/assets/script/components/navbar.js', 
    [], false, true);
    wp_enqueue_script('script_carousel',
    get_template_directory_uri() . '/assets/script/components/carousel.js', 
    [], false, true);
    /* Perso Script Pages */
    wp_enqueue_script('script_homepage',
    get_template_directory_uri() . '/assets/script/pages/homepage.js', 
    [], false, true);
    wp_enqueue_script('script_catalog',
    get_template_directory_uri() . '/assets/script/pages/catalog.js', 
    [], false, true);
    wp_enqueue_script('script_creation_post',
    get_template_directory_uri() . '/assets/script/pages/creation-post.js', 
    [], false, true);
}

add_filter('nav_menu_css_class', function ($classes) {
    $classes[] = "nav-item";
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($attr) {
    $attr['class'] = 'nav-link';
    return $attr;
});

function wpheticPaginate()
{
    $pages = paginate_links(['type' => 'array']);
    if (!$pages) {
        return null;
    }   

    ob_start();
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current');
        $liClass = $active ? 'page-item active' : 'page-item';
        $page = str_replace('page-numbers', 'page-link', $page);

        echo sprintf('<li class="%s">%s</li>', $liClass, $page);
    }
    echo '</ul></nav>';

    return ob_get_clean();
}

function createUser() 
{   
    if ($_POST["pwd"] == $_POST["verification"]){
        if(isset($_POST["manager"])){
            $role = "manager";
        }else{
            $role = "utilisateur";
        }
        
        wp_insert_user( array(
            'user_pass' => $_POST["pwd"],
            'user_login' => $_POST["username"],
            'user_email' => $_POST["log"],
            'role' => $role
        ));
    } else {
        $_SESSION["error_pass"] = TRUE;
    }

    wp_redirect(home_url($_SESSION["url"]));
};
add_action('admin_post_nopriv_insert_user', 'createUser');


 function createPost()
{
    if(wp_verify_nonce($_POST['upload_post_nonce'], 'upload_post')){
        $post_args =array(
            'post_content' => $_POST["message_post"],
            'post_title' => $_POST["post_title"],
            'post_type'=> 'post',
            'post_status' => 'pending',
            'post_author' => get_current_user_id(),
            'comment_status'=> 'open',
            'tax_input' => [
                'logement' => [$_POST['post_logement']]
            ],
            'meta_input'=>array(
                'post_price' => $_POST["post_price"],
                'chambre' => $_POST['nb_chambre'],
                'lit' =>$_POST['nb_lit'],
                'piece' =>$_POST['nb_piece'],
                'location' => $_POST['location'],
            )
        );

        $terms = array();
        if($_POST["appartements"] === "on"){
            array_push($terms,"appartements");
        }
        if($_POST["Maisons"] === "on"){
            array_push($terms,"Maisons");
        }
        if($_POST["villa"] === "on"){
            array_push($terms,"villa");
        }
        if($_POST["dépendance"] === "on"){
            array_push($terms,"dépendance");
        }
        if($_POST["wifi"] === "on"){
            array_push($terms,"wifi");
        }
        if($_POST["lave-Linge"] === "on"){
            array_push($terms,"lave-Linge");
        }
        if($_POST["seche-linge"] === "on"){
            array_push($terms,"seche-linge");
        }
        if($_POST["piscine"] === "on"){
            array_push($terms,"piscine");
        }
        if($_POST["cuisine"] === "on"){
            array_push($terms,"cuisine");
        }
        if($_POST["jacuzzi"] === "on"){
            array_push($terms,"jacuzzi");
        }
        if($_POST["logement_fumeur"] === "on"){
            array_push($terms,"logement_fumeur");
        }
        if($_POST["animaux_acceptés"] === "on"){
            array_push($terms,"animaux_acceptés");
        }

        //Insérer un post en base de données
        $post_id = wp_insert_post($post_args);
        //Traitement d'upload d'image - Si tout a marché -> rattache l'image au post
        $attachment_id = media_handle_upload('post_image', $post_id);
        /* Inserer taxonomy */
        wp_set_object_terms($post_id , $terms ,'logement');

        if(is_wp_error($attachment_id)){
            wp_redirect($_POST['_wp_http_referer']. '.status=error'); //redirect objet d'erreur
        }else{
            set_post_thumbnail($post_id, $attachment_id);
            //var_dump(get_permalink($post_id));
            wp_redirect(home_url());
        }
    }else{
        wp_redirect($_POST['_wp_http_referer'].'?status=no_once');
    }
};
add_action('admin_post_upload_post', 'createPost');

function wphetic_register_style_taxonomy(){
    
    $labels = [
        'name' => 'logement',
        'singular_name' => 'logement',
        'search_items' => 'Rechercher logement',
        'all_items' => 'Tous les types de logement',
        'edit_item' => 'Editer le logement',
        'update_item' => 'Mettre a jour type le logement',
        'add_new_item' => 'Ajouter un nouveau type logement',
        'new_item_name' => 'Ajouter un nouveau type logement',
        'menu_name' => 'Logements'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ];

    register_taxonomy('logement', 'post', $args);

}


add_action('after_setup_theme','wphetic_theme_support');

/*Ajout de bootstrap*/
add_action('wp_enqueue_scripts','wphetic_bootstrap');

/*Ajout de la taxonomie*/
add_action('init','wphetic_register_style_taxonomy');

/*Ajout d'un terme à la taxonomie 'style'*/
add_action('after_switch_theme', function() {
    wp_insert_term('Dubstep', 'style'); //Insertion du terme 'Dubstep' dans la taxonomie 'style'
    flush_rewrite_rules(); //Empêche les bugs de réécriture d'URL
});

/*Ajout du rôle Utilisateur*/
add_action('after_switch_theme', function() {
    add_role('utilisateur', 'Utilisateur', array(  //Création du rôle
        'delete_posts' => true,
        'edit_posts' => true,
        'publish_posts' => true
        //C'est ici qu'on définiera les droits de nos utilisateurs
    ));
});

/*Ajout du rôle Manager*/
add_action('after_switch_theme', function() {
    add_role('manager', 'Manager', array(  //Création du rôle
        'read' => true, //Ajout du droit pour lire
        'delete_posts' => false,
        'edit_posts' => true,
        'publish_posts' => true,
        'delete_others_posts' => true,
        'delete_published_posts' => true,
        'delete_private_posts' => true,
        'edit_others_posts' => true,
        'edit_private_posts' => true,
        'edit_published_posts' => true,
        'read_privates_posts' => true,
        'moderate_comments' => true,
        'edit_comments' => true
        //C'est ici qu'on définiera les droits de nos utilisateurs
    ));
});

/*Nettoyer les droits donnés aux utilisateurs pour ne pas entacher les autres thèmes*/
add_action('switch_theme', function() {
    $admin = get_role('administrator'); //Récupération du rôle 'administrator
    remove_role('manager');
    remove_role('utilisateur'); //Suppression du role 
});

add_filter('manage_post_posts_columns', function($col) {
    return array(
        'cb' => $col['cb'],
        'title' => $col['title'],
        'image' => 'Image',
        'price' => 'Prix',
        'location' => 'Lieu',
        'taxonomy-logement' => $col['taxonomy-logement'],
        'date' => $col['date']
    );
});

add_action('manage_post_posts_custom_column', function($col, $post_id) {
    if($col === 'image'){
        the_post_thumbnail('thumbnail', $post_id);
    }
    elseif($col === 'price'){
        if(get_post_meta($post_id, 'post_price', true) == null){
            echo("Pas de prix");
        }else{
            echo(get_post_meta($post_id, 'post_price', true) . " €");
        }
    }
    elseif($col === 'location'){
        if(get_post_meta($post_id, 'location', true) == null){
            echo("Pas de lieu");
        }else{
            echo(get_post_meta($post_id, 'location', true));
        }
    }
   
}, 10, 2);

/* require_once('options/BannerMessage.php');
BannerMessage::register(); */

function search_post(){

    //$voyageurs ($_POST["adulte"] + $_POST["enfant"] ou $_POST["voyageurs"]) )
    $voyageurs = 0;
    if($_POST["voyageurs"] != 0){
        $voyageurs = $_POST["voyageurs"];
    }else {
        if($_POST["adultes"] != 0 && $_POST["enfants"] != 0){
            $voyageurs = $_POST["adultes"] + $_POST["enfants"];
        }else{
            if($_POST["adultes"] != 0) {
                $voyageurs = $_POST["adultes"];
            }elseif($_POST["enfants"] != 0){
                $voyageurs = $_POST["enfants"];
            }
        }
    }

    /* Ville du logement */
    $location = array("");
    if(isset($_POST["location"])){
        $location = array($_POST["location"]);
    };

    //Fonction des cas particuliers
    $typeDeLogement = array(); 
    if($_POST["appartements"] === "on"){
        array_push($typeDeLogement,"appartements");
    }
    if($_POST["Maisons"] === "on"){
        array_push($typeDeLogement,"Maisons");
    }
    if($_POST["villa"] === "on"){
        array_push($typeDeLogement,"villa");
    }
    if($_POST["dépendance"] === "on"){
        array_push($typeDeLogement,"dépendance");
    }
    if($_POST["wifi"] === "on"){
        array_push($typeDeLogement,"wifi");
    }
    if($_POST["lave-Linge"] === "on"){
        array_push($typeDeLogement,"lave-Linge");
    }
    if($_POST["seche-linge"] === "on"){
        array_push($typeDeLogement,"seche-linge");
    }
    if($_POST["piscine"] === "on"){
        array_push($typeDeLogement,"piscine");
    }
    if($_POST["cuisine"] === "on"){
        array_push($typeDeLogement,"cuisine");
    }
    if($_POST["jacuzzi"] === "on"){
        array_push($typeDeLogement,"jacuzzi");
    }
    if($_POST["logement_fumeur"] === "on"){
        array_push($typeDeLogement,"logement_fumeur");
    }
    if($_POST["animaux_acceptés"] === "on"){
        array_push($typeDeLogement,"animaux_acceptés");
    }
    if($typeDeLogement == array()){
        $typeDeLogement = "Type de logement";
    };


    /* Les comparateurs */
    if($voyageurs==0){
        $comparateurVoyageur = '>=';
        $voyageurs == 0;
    }else{
        $comparateurVoyageur = '=';
    };

    
    if($location== array("")){
        $comparateurLocation = '!=';
    }else{
        $comparateurLocation = '=';
    };

    //Création des paramètres de la requêtes
    $args = array( 
        'posts_per_page' => 100,
        'post_type' => 'post',
        'tax_query' => array( 
            array( 
                'taxonomy' => 'logement', 
                'field' => 'slug',
                'terms' => $typeDeLogement,
                'compare' => '='
            ) 
        ),
        'meta_query' => array( 
            'relation' => 'AND', 
            array( 
                'key' => 'lit', 
                'value' => $voyageurs,
                'type' => 'numeric', 
                'compare' => $comparateurVoyageur, 
            ),
            array( 
                'key' => 'location', 
                'value' => $location,
                'compare' => $comparateurLocation, 
            )
        ) 
    );

    /* $postslist = get_posts( $args ); */
    $_SESSION["args"] = $args;
    wp_redirect(home_url("catalog"));
};
add_action('admin_post_nopriv_search_post', 'search_post');
add_action('admin_post_search_post', 'search_post');

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !current_user_can('manager')) {
        show_admin_bar(false);
    }
}