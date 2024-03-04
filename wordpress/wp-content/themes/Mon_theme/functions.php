<?php
/*
add_action('wp_head',function(){
    
    die('salut je suis le premier add_action');
});
add_action('wp_head',function(){
    
    die('aurevoir je suis priorite');
},5);

*/
# a partir de maintenant on utilise le filtre 

function montheme_title_separator(){
    return '|';
}
add_filter('document_title_separator', 'montheme_title_separator');
function montheme_title_parts($title){
    $title['site']= 'word press';
    $title['des'] = 'utilise un hook filtre';
    $title['title']='filtre';
   unset($title['tagline']);
    return $title;
}
add_filter('document_title_parts','montheme_title_parts');




add_action('after_setup_theme', function(){
    # ajouter un support de titre a notre theme
    add_theme_support('title-tag');
    # ajouter un support de media a notre theme
    add_theme_support('post-thumbnails');
    # ajouter le support de la menu a  notre plugin
    add_theme_support('menus');
    # creer une autre menu
    register_nav_menu('header', 'En tete du menu');
    register_nav_menu('footer','En fin de page');
    # format d'image
    add_image_size('card-header', 350, 350, true);
});
# function qui permet d'appeler un style via un dossier

    function montheme_register_asset(){
        wp_register_style('bootstrap', get_template_directory_uri().'/bootstrap4-offline-docs-4.3/dist/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');  
    }




add_action('wp_enqueue_scripts', 'montheme_register_asset');

# appeler les meta box
require_once('metabox/Sponso.php');
require_once('metabox/Louer.php');

Sponso::register();
Louer::register();

function montheme_init() {
# les taxonomy ou le trie
    register_taxonomy('sport', 'post', [
        'labels' => [
            'name' => 'Sport',
            'singular_name'     => 'Sport',
            'plural_name'       => 'Sports',
            'search_items'      => 'Rechercher des sports',
            'all_items'         => 'Tous les sports',
            'edit_item'         => 'Editer le sport',
            'update_item'       => 'Mettre à jour le sport',
            'add_new_item'      => 'Ajouter un nouveau sport',
            'new_item_name'     => 'Ajouter un nouveau sport',
            'menu_name'         => 'Sport',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
   
    #fonction qui sert a enregistrer de nouveau type de contenu qu'il sera ensuite possible d'administrer et de consulter.
    register_post_type('bien',[
        'label' => 'Bien',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
       
        
    ]);
    
}

add_action('init', 'montheme_init'); 

# activer les options 
require 'options/agence.php';
AgenceMenuPage::register();

# function qui permet d'ajouter des colones supplementaire dans le colone d'administration de notre contenu personaliser
# ici on veut ajouter un colone qui affiche l'image miniature 
add_filter('manage_bien_posts_columns',function($columns){
    return [
        'cb'=>$columns['cb'],
        'thumbnail'=> 'Miniature',
        'title'=> $columns['title'],
        'date'=>$colums['date'],
    ];
});
#ajouter un contenu dans le colone
add_filter('manage_bien_posts_custom_column', function($columns,$postId){
    if($columns === 'thumbnail'){
        the_post_thumbnail('thumbnail',$postId);
    }
},10,2);
// ici on utilise le pre_get_posts()
/**
 * @param WP_Query $query
 */
function montheme_pre_get_posts($query){
    if (is_admin() || !is_home() || !$query->is_main_query()) {
        return;
    }
    if (get_query_var('sponso') === '1') {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => SponsoMetaBox::META_KEY,
            'compare' => 'EXISTS',
        ];
        $query->set('meta_query', $meta_query);
        var_dump($query); die();
    }
}
add_action('pre_get_posts', 'montheme_pre_get_posts');

function montheme_query_vars ($params) {
    $params[] = 'sponso';
    return $params;
}
add_filter('query_vars', 'montheme_query_vars');

# gestion des sidebars
require_once 'widgets/YoutubeWidget.php';

function montheme_register_widget () {
    register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'homepage',
        'name' => 'Sidebar Accueil',
        'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="font-italic">',
        'after_title' => '</h4>'
    ]);
}
add_action('widgets_init', 'montheme_register_widget');

# on gere le widget


