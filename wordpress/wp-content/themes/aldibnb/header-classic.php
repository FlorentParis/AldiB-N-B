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
                <li>Inscription</li>
                <li>Connexion</li>
            </ul>
        </div>
    </header>
    <?php 
    if(!empty(get_option('agence_horaire'))){
        ?>
        <div class="alert alert-danger" role="alert">
        <?= get_option('agence_horaire'); ?>
        </div>
        <?php
    };
    