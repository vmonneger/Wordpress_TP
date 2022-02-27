<?php

namespace App;

function supports () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  register_nav_menu('header', 'Menu navbar');
  register_nav_menu('footer', 'Menu footer');
}

function register_assets () {
  wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_register_script('bootstrap_bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js');
  wp_enqueue_style('bootstrap');
  wp_enqueue_script('bootstrap_bundle');
}

function title ($title) {
  return 'Yoooo c\'est le titre ' . $title;
}

function menu_class($classes) {
  $classes[] = 'nav-item';
  return $classes;
}

function menu_link_class($atts) {
  $atts['class'] = 'nav-link';
  return $atts;
}

add_action('after_setup_theme', 'App\supports');
add_action('wp_enqueue_scripts', 'App\register_assets');
add_filter('wp_title', 'App\title');
add_filter('nav_menu_css_class', 'App\menu_class');
add_filter('nav_menu_link_attributes', 'App\menu_link_class');