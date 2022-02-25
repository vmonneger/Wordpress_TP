<?php



function montheme_supports () {
    add_theme_support('title-tag');
}

function montheme_register_assets(){
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_script( 'bootstrap' );
}

function montheme_title($title){
    return 'Salut ' . $title;
}

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('wp_title', 'montheme_title');
