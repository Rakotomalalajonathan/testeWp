<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
        # permet de recupperer le header 
        wp_head(); 
    ?>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><?php bloginfo('name');?></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php wp_nav_menu([
                    'theme_location'=> 'header', 
                    'container'=>'false',
                    'menu_class'=> 'navbar-nav mr-auto'
                    ]); ?>
            <?php # ce function va chercher le fichier searchform.php?>
            <?= get_search_form()?>
        </div>
    </nav>

    <div class="container my-4">
    
