
<?php get_header() ?>
<?php
# apppele un taxonomie
$sports = get_terms(['taxomonie'=>'sport']);
?>
<ul class="nav nav-pills my-4">
    <?php foreach($sports as $sport): ?>
    <li class="nav-item">
        <a href="<?= get_term_link($sport) ?>" class="nav-link <?= is_tax('sport', $sport->term_id) ? 'active' : '' ?>"><?= $sport->name ?></a>
    </li>
    <?php endforeach; ?>
</ul>

<?php
# ici on fait le boucle
if(have_posts()):?>
   <div class="row text-center">
        <?php   while(have_posts()):
            the_post();
            //permet de recuperer tout les postes
        ?><div class="card " style="width: 18rem;">
        <?php the_post_thumbnail('card-header',['class'=>'card-img-top']); ?>
        <div class="card-body">
          <h5 class="card-title"> <?php the_title( '<h2>', '</h2>' ); ?></h5>
          <p class="card-text"><?php the_excerpt("voir plus"); ?></p>
          <?php
          #permet d'afficher le taxonomie
            the_terms(get_the_ID(),'sport');
          ?>
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
// get_sidebar();
?>
<div class = "bg-dark text-white my-4 ">
  <center>
  <h2>Sidebar</h2>
  </center>
            <?php get_sidebar('homepage');?>
          </div>
<?php get_footer() ?>
