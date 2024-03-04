<?php
# c'est le formulaire pour le commentaire utilisateur

# on va aficher le nombre de commentaire

$count = absint(get_comments_number());
?>
<?php if ($count > 0): ?>
    <center> <h2><?= $count?> commentaire<?= $count > 1 ? 's' : '' ?></h2></center>
<?php else : ?>
    <center><h2>Ajouter un commentaire</h2></center>
<?php endif; ?>

<?php
#  maintenant on va afficher le formulaire
if(comments_open()){
    comment_form(['title_reply'=> '', 
                    'class_submit'=> 'btn btn-outline-primary',
                    'label_submit'=> 'envoyer',
    ]);
}
?>
<div class = "bg-dark text-white my-4 mr-md-3 pt-3 px-3 pt-md-2 px-md-5 px-mb-5 text-left rounded-lg">
    <?php wp_list_comments(); ?>
</div>