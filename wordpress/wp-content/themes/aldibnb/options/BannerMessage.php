<?php

class BannerMessage
{
    const GROUP = "agence_options";
    const SETTING_SECTION = "wphetic_section";

    public function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function registerSettings() {
        register_setting(
            self::GROUP, 
            'agence_horaire',
            ['default' => false]
        );
        add_settings_section(
            'agence_options_section', 
            'Paramètres', 
            function(){
                echo'Vous pouvez ici gérer les paramètres liés à l\'agence immobilière'; 
            },
            self::GROUP
        );
        add_settings_field(
            'agence_options_horaire', 
            'Horaires d\'ouverture', 
            function(){
                ?>
               <textarea name="agence_horaire" cols="30" rows="10" style="width:100%;"><?=get_option('agence_horaire') ?></textarea>
                <?php
            }, 
            self::GROUP, 
            'agence_options_section'
        );
    }

    public function addMenu()
    {
        add_options_page(
            'Gestion de l\'agence',
            'Agence',
            'manage_options',
            'agence_options',
            [self::class, 'render']
        );
    }
    
    

    public function render()
    {
        ?>
        <h2>Gestion de l'agence</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button();
            ?>
        </form>
        <?php
    }
}




?> 