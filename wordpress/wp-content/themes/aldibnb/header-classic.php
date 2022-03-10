<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
    <header class="header-classic">
        <div class="nav-container">
            <div class="nav-left">
                <img src="/wp-content/themes/aldibnb/assets/img/LogoBlancAldiBnB.png"/>
                <span>AldiB'n'B</span>
            </div>
            <ul class="nav-right">
                <li>Publier une annonce</li>
                <li id="inscription-link">Inscription</li>
                <li id="connexion-link">Connexion</li>
            </ul>
        </div>
    </header>

    <div class="modal-container">
        <div class="modal-element">
            <img src="/wp-content/themes/aldibnb/assets/icons/cross-blue.svg" id="modal-close"/>
            <div class="container-inscription">
                <div class="title">Inscription</div>
                <form action="">
                    <span>Informations</span>
                    <div>
                        <div class="content-input">
                            <div>
                                <label for="">Prénom</label>
                                <input type="text" name="" id="" placeholder="Votre prénom">
                            </div>
                            <div>
                                <label for="">Nom</label>
                                <input type="text" name="" id="" placeholder="Votre nom">
                            </div>
                        </div>
                        <p>Assurez-vous qu’il correspond au nom figurant sur votre pièce d’identité.</p>
                    </div>
                    <span>Date de naissance</span>
                    <input type="date">
                    <div class="content-input content-mail">
                        <label for="">Adresse e-mail</label>
                        <input type="mail" placeholder="Votre adresse e-mail">
                    </div>
                    <p>Nous vous enverrons les confirmations et les reçus de votre voyage par e-mail.</p>
                    <div class="checkbox-content">
                        <input type="checkbox" name="" id="">
                        <p>Je souhaite recevoir des messages promotionnels d'Aldibnb.</p>
                    </div>
                    <button type="submit">Accepter et continuer</button>
                </form>
                <p>En cliquant sur <span>Accepter et continuer</span>, j’accepte les <a href="">Conditions générales</a>, les <a href="">Conditions de service relatives aux paiements</a>, la <a href="">Politique de non-discrimination</a> et je reconnais avoir pris connaissance de la <a href="">Politique de confidentialité</a> d’AldiBnB.</p>
            </div>
            <div class="container-connexion">
                <div class="title">Connexion</div>
                <form action="">
                    <div class="content-input">
                        <label for="">Adresse e-mail</label>
                        <input type="mail" placeholder="Votre adresse e-mail">
                    </div>
                    <div class="content-input">
                        <label for="">Mot de passe</label>
                        <input type="password" placeholder="Votre mot de passe">
                    </div>
                    <div class="checkbox-content">
                        <input type="checkbox" name="" id="">
                        <p>Je souhaite recevoir des messages promotionnels d'Aldibnb.</p>
                    </div>
                    <button type="submit">Se connecter</button>
                </form>
                <div class="psw-forget"><a href="">Mot de passe oublié ?</a></div>
            </div>
        </div>
    </div>

    <?php 
    if(!empty(get_option('agence_horaire'))){
        ?>
        <div class="alert alert-danger" role="alert">
        <?= get_option('agence_horaire'); ?>
        </div>
        <?php
    };
    