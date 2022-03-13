<?php 
session_start();
$_SESSION["url"] = $wp->request;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
    <header class="header-cat">
        <div class="nav-container">
            <button class="nav-left" onclick="window.location=`/`;">
                <img src="/wp-content/themes/aldibnb/assets/img/LogoBlancAldiBnB.png"/>
                <span>AldiB'n'B</span>
            </button>
            <ul class="nav-right">
                <li><a href="<?php bloginfo('url'); ?>/creation-post/">Publier une annonce</a></li>
                <?php if(is_user_logged_in() == FALSE){ ?>
                <li id="inscription-link">Inscription</li>
                <li id="connexion-link">Connexion</li>
                <?php } else { ?>
                    <li id="deconnexion-link"><a role="button" href="<?php echo wp_logout_url(home_url($_SESSION["url"])); ?>">deconnexion</a></li>
                <?php }; ?>
            </ul>
            <div id="burger-content">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div class="modal-container">
        <div class="modal-element">
            <img src="/wp-content/themes/aldibnb/assets/icons/cross-blue.svg" id="modal-close"/>
            <div class="container-inscription">
                <div class="title">Inscription</div>
                <form method="post" action ="http://localhost:5555/wp-admin/admin-post.php"  enctype="multipart/form-data">
                    <span>Informations</span>
                    <div>
                        <div class="content-input">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Votre username">
                            </div>
                            <div>
                                <label for="InputEmail">Adresse e-mail</label>
                                <input type="text" id="InputEmail" name="log" placeholder="Votre adresse e-mail">
                            </div>
                        </div>
                        <p>Nous vous enverrons les confirmations et les reçus de votre voyage par e-mail.</p>
                    </div>
                    <span>Mot de passe</span>
                    <div>
                        <div class="content-input">
                            <div>
                                <label for="InputPassword">Mot de passe</label>
                                <input type="password" id="InputPassword" name="pwd" placeholder="Votre mot de passe">
                            </div>
                            <div>
                                <label for="verification">Vérification mot de passe</label>
                                <input type="password" id="verification" name="verification" placeholder="Vérification de votre mot de passe">
                            </div>    
                        </div>
                        <?php if(isset($_SESSION["error_pass"])) { ?>
                                  <p class="error">Les mots de passe ne sont pas identiques</p>
                        <?php }; ?>
                    </div>
                    <div class="checkbox-content">
                        <input type="checkbox" name="" id="">
                        <p>Je souhaite recevoir des messages promotionnels d'Aldibnb.</p>
                    </div>
                    <input type="hidden" name="action" value="insert_user">
                    <button type="submit">Submit</button>
                </form>
                <p>En cliquant sur <span>Accepter et continuer</span>, j’accepte les <a href="">Conditions générales</a>, les <a href="">Conditions de service relatives aux paiements</a>, la <a href="">Politique de non-discrimination</a> et je reconnais avoir pris connaissance de la <a href="">Politique de confidentialité</a> d’AldiBnB.</p>
            </div>
            
            <div class="container-connexion">
                <div class="title">Connexion</div>
                <form action="<?= home_url('wp-login.php');?>" method="post">
                    <div class="content-input">
                        <label for="InputEmail2">Adresse e-mail</label>
                        <input type="mail" placeholder="Votre adresse e-mail" id="InputEmail2" name="log">
                    </div>
                    <div class="content-input">
                        <label for="InputPassword2">Mot de passe</label>
                        <input type="password" id="InputPassword1" name="pwd"  placeholder="Votre mot de passe">
                    </div>
                    <div class="checkbox-content">
                        <input type="checkbox" name="" id="">
                        <p>Je souhaite recevoir des messages promotionnels d'Aldibnb.</p>
                    </div>
                    <input type="hidden" name="redirect_to" value="<?php echo home_url($_SESSION["url"]) ?>">
                    <button type="submit">Se connecter</button>
                </form>
                <div class="psw-forget"><a href="">Mot de passe oublié ?</a></div>
            </div>
        </div>
    </div>
    