<?php
class Louer
{
    const META_KEY = 'bien_louer';
    public static function register (){
         # on appel le function qui permet de creer un box pour gerer les meta donnees
         add_action('add_meta_boxes',[self::class, 'add']);
         # on appel la function qui enregistre les metadonne 
         add_action('save_post',[self::class, 'save']);
    }
    public static function add(){
        add_meta_box(self::META_KEY,'louer',[self::class,'render'],'bien');
    }
    public static function render($post){
        $value = get_post_meta($post->ID,self::META_KEY, true);
        #c'est le contenu de sponsoring
        ?>
        <input type="hidden" name="<?=self::META_KEY?>" id="Louer" value = "0">
        <input type="checkbox" name="<?=self::META_KEY?>" id="Louer"  value = "1" <?php checked($value, '1');?>>
        <label for="Louer"> cet maison est deja louer?</label>
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
