<?php


/**
 * le metadonne est un information supplementaire apporter a un article 
 * le metadonne est enregistree dans la base de donne 
 * La class sponson va gerer le metadonne
 * // Pour ajouter une meta
add_meta_box($postId,'ma_meta','contenu','type |post ou page|');

 * // Pour mettre à jour ou ajouter une meta
update_post_meta($postId, 'ma_meta', 'ma valeur');

* // Pour supprimer une meta
delete_post_meta($postId, 'ma_meta');

* // Récupère une métadonnée
get_post_meta($postId, 'ma_meta');
 */


class Sponso 
{
    const META_KEY = 'montheme_sponso';
    public static function register(){
        # on appel le function qui permet de creer un box pour gerer les meta donnees
        add_action('add_meta_boxes',[self::class, 'add']);
        # on appel la function qui enregistre les metadonne 
        add_action('save_post',[self::class, 'save']);
    }
    public static function add(){
        #function qui permet de creer un meta box
        add_meta_box(self::META_KEY,'sponsoring',[self::class,'render'],'post');
    }
    public static function render($post){
       
        $value = get_post_meta($post->ID,self::META_KEY, true);
        #c'est le contenu de sponsoring
        ?>
        <input type="hidden" name="<?=self::META_KEY?>" id="monthemesponso" value = "0">
        <input type="checkbox" name="<?=self::META_KEY?>" id="monthemesponso"  value = "1" <?php checked($value, '1');?>>
        <label for="monthemesponso"> cet article est sponsorise ? </label>
        <?php
    }
    public static function save($post_id){
# function qui sert a sauvegarder un article et son metadonne

        if(array_key_exists(self::META_KEY,$_POST)){
            if($_POST[self::META_KEY] === 0 && current_user_can('edit_post',$post_id)){
                delete_post_meta($post_id,self::META_KEY);
            }else{
                update_post_meta($post_id,self::META_KEY,1);
            }
        }
    }
}
