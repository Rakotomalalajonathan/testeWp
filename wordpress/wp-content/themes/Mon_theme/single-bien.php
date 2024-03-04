<?php get_header() ?>


<h1>Nos bien</h1>
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
  <?php if(get_post_meta(get_the_ID(),Louer::META_KEY,true) === '1'): ?>
    <div class="alert alert-info" role = "alert">
        cet refuge est Loue
    </div>
  <?php endif;?>  
  <p class="card-text"><?php the_content(); ?></p>
  <?php
  #permet d'afficher le taxonomie
    the_terms(get_the_ID(),'type');
  ?>
 
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