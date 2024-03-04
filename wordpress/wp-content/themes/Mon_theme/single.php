<?php get_header() ?>



<?php
# ici on fait le boucle
if(have_posts()):?>
   
<?php   while(have_posts()):
    the_post();
    //permet de recuperer tout les postes
?>
<center>
  <div class="card" style="width: 58rem;">
    <img src=" <?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="..." heigth ="80px" >
    <div class="card-body">
      <h5 class="card-title"> <?php the_title( '<h2>', '</h2>' ); ?></h5>
      <?php if(get_post_meta(get_the_ID(),Sponso::META_KEY,true) === '1'): ?>
        <div class="alert alert-info" role = "alert">
            cet article est sponsorise
        </div>
      <?php endif;?>  
      <p class="card-text"><?php the_content(); ?></p>
    </div>
    <?php the_author(); ?> 
  </div>
</center>
<?php
# gerer les commentaire des utilisateurs
  if(comments_open() || get_comments_number()){
    comments_template();
  }
  else{
    echo "je peux pas";
  }

?>
  <hr>
  <center><h2>voir aussi </h2></center>

<div class="row mt-4">
<?php
# la class WP_Query() qui sert a afficher les articles

$query = new WP_Query([
  'post__not_in' => [get_the_ID()],   # c'est le ID a ignorer
  'post_type' => 'post', #type du contenu qu'on veut reccuperer
  'posts_per_page' => 3, # nombre maximum de l'article qu'on veut afficher
  
]);
#peremet d'afficher les resultats
while ($query->have_posts()) : $query->the_post();
?>
  <div class="col-sm-4">
    <?php get_template_part('parts/card', 'post'); ?>
  </div>
<?php endwhile; wp_reset_postdata(); ?>
    <?php endwhile;?>
    </div>
 <?php 
 endif;
//get_sidebar();
?>

<?php
 get_footer();
 ?>