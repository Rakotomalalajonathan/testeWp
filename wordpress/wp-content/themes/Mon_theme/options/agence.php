<?php

/**
 * class qui sert a  ajouter une page d'option sur WordPress.
 L'ajout d'un panneau d'option se fait en 2 étapes :
 *On déclare les nouveaux paramètre à gérer gràce à l'API Settings
 *On enregistre une nouvelle entrée dans le menu gràce aux méthodes 
    add_options_page, add_menu_page ou add_submenu_page.
    Et on génère une page de formulaire qui permettra de remplir les différentes informations
 */
class AgenceMenuPage{
    const GROUP = 'agence_options';
    public static function register () {
        #creer les menus
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }
    
   
    public static function registerScripts($suffix){
        # on veut utiliser simplement notre css et js dans la page agence option
        if ($suffix === 'settings_page_agence_options') {
            wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
            wp_enqueue_script('montheme_admin', get_template_directory_uri() . '/assets/admin.js', ['flatpickr'], false, true);
            wp_enqueue_style('flatpickr');
        }
    }
    public static function registerSettings(){
        register_setting(self::GROUP, 'agence_horaire');
        register_setting(self::GROUP, 'agence_date',);
       # function qui gere l'ecriture et les sections au niveau de la page setting


       /**
        section : agence_otion_section
        */


        add_settings_section('agence_options_section', 'description', function () {
            echo "Vous pouvez ici gérer les paramètres liés à l'agence immobilière";
        }, self::GROUP);


       # function qui gere les champs dans un section


        add_settings_field('agence_options_horaire', "Horaires d'ouverture", function () {
            ?>
            <textarea name="agence_horaire" cols="30" rows="10" style="width: 100%"><?= esc_html(get_option('agence_horaire')) ?></textarea>
            <?php
        }, self::GROUP, 'agence_options_section');
        add_settings_field('agence_options_date', "Date d'ouverture", function () {
            ?>
            <input type="date" name="agence_date" value="<?= esc_attr(get_option('agence_date')) ?>" class="montheme_datepicker">
            <?php
        }, self::GROUP, 'agence_options_section');
        

    }
    public static function addMenu(){

        #Ajoute une page de sous-menu au menu principal Paramètres.
        add_options_page("Gestion de l'agence", "Agence", "manage_options", self::GROUP, [self::class, 'render']);
    }
    public static function render(){
        ?>
      
        <h1>Gestion de l'agence</h1>


        <form action="options.php" method="post">

            <?php 
            /**
            *permet de recupperer le champs declare par add_settings_fields
             */

            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button();
           var_dump(get_option('agence_date'));
            ?>
        </form>
        <?php 
    }

}