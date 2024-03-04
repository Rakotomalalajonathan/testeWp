<?php
/**
 * Template Name: Page avec banniere
 * Template Post Type: page, post
 */
?>
<?php get_header() ?>
<?php
# ici on fait le boucle
if(have_posts()):?>
   <div class="row">
<?php   while(have_posts()):
    the_post();
    //permet de recuperer tout les postes
   
?><div class="card " style="width: 18rem;">
<img src=" <?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="..." heigth ="80px" >
<div class="card-body">
  <h5 class="card-title"> <?php the_title( '<h2>', '</h2>' ); ?></h5>
 
  <p class="card-text"><?php the_content(); ?></p>
 
 
</div>
<?php the_author(); ?> 
</div>

    <?php endwhile;?>
    </div>
 <?php 
 endif;
//get_sidebar();
 get_footer();
 ?>