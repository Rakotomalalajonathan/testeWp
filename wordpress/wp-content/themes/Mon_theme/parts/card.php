<div class="card " style="width: 18rem;">
<?php the_post_thumbnail('card-header',['class'=>'card-img-top']); ?>
<div class="card-body">
  <h5 class="card-title"> <?php the_title( '<h2>', '</h2>' ); ?></h5>
  <p class="card-text"><?php the_excerpt("voir plus"); ?></p>
  <br>
  <a href="<?php the_permalink(); ?>" class="btn btn-primary">voir plus</a>
 
</div>
<?php the_author(); ?> 
</div>