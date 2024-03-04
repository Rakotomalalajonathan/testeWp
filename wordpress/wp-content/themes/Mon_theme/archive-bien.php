
<?php get_header() ?>

<?php
# ici on fait le boucle
if(have_posts()):?>
<h1> Voir tout nos bien </h1>
   <div class="row">
<?php   while(have_posts()):
    the_post();
    //permet de recuperer tout les postes
?><div class="card " style="width: 18rem;">
<?php the_post_thumbnail('card-header',['class'=>'card-img-top']); ?>
<div class="card-body">
  <h5 class="card-title"> <?php the_title( '<h2>', '</h2>' ); ?></h5>
  <p class="card-text"><?php the_excerpt("voir plus"); ?></p>
  <br>
  <a href="<?php the_permalink(); ?>" class="btn btn-primary">voir plus</a>
 
</div>
<?php the_author(); ?> 
</div>

    <?php endwhile;?>
    </div>
 <?php 
else:?>
    <div class="alert alert-danger" role="alert">
    page introuvable
  </div>
  <?php
endif;
//get_sidebar();
?>

<?php get_footer() ?>
