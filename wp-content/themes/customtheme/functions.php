<?php

namespace App;
require_once('metaboxes/sponso.php');

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
  wp_enqueue_style( 'style', get_stylesheet_uri() );
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

function pagination () {
  $pages = paginate_links(['type' => 'array']);
  if ($pages === null) {
    return;
  }
  echo '<nav aria-label="Page navigation example">';
  echo '<ul class="pagination">';
  foreach ($pages as $page) {
    $active = strpos($page, 'current') !== false;
    $class = 'page-item';
    if ($active) {
      $class .= ' active';
    }
    echo '<li class="' . $class .'">';
    echo str_replace('page-numbers', 'page-link', $page);
    echo '</li>';
  }
  echo '</ul>';
  echo '</nav>';
}

function change_menu_name() {
  global $menu;
  $menu[5][0] = 'Location';
}

function theme_init() {
  register_taxonomy('logement', 'post', [
    'labels' => [
      'name' => 'Logement',
      'singular_name' => 'Logement',
      'plural_name' => 'Logements',
      'search_items' => 'Rechercher des logements',
      'all_items' => 'Tous les logements',
      'edit_item' => 'Editer le logement',
      'update_item' => 'Mettre à jour le logement',
      'add_new_item' => 'Ajouter un nouveau logement',
      'new_item_name' => 'Ajouter un nouveau logement',
      'menu_name' => 'Logement'
    ],
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_admin_column' => true
  ]);
  $get_post_type = get_post_type_object('post');
  $get_post_type->label = 'Location';
  $labels = $get_post_type->labels;
  $labels->name = 'Location';
  $labels->singular_name = 'Location';
  $labels->add_new = 'Ajouter une nouvelle location';
  $labels->add_new_item = 'Ajouter une nouvelle location';
  $labels->edit_item = 'Modifier la location';
  $labels->new_item = 'Nouvelle location';
  $labels->view_item = 'Voir la location';
  $labels->view_items = 'Voir les locations';
  $labels->name = 'Location';
  $labels->all_items = 'Toutes les locations';
}

add_action('init', 'App\theme_init');
add_action('after_setup_theme', 'App\supports');
add_action('admin_menu', 'App\change_menu_name');
add_action('wp_enqueue_scripts', 'App\register_assets');
add_filter('wp_title', 'App\title');
add_filter('nav_menu_css_class', 'App\menu_class');
add_filter('nav_menu_link_attributes', 'App\menu_link_class');
add_action('admin_enqueue_scripts', function () {
  wp_enqueue_style('admin_theme', get_template_directory_uri() . '/assets/admin.css');
});

\Sponso\SponsoMetabox::register();

// add_filter('manage_post_posts_columns', function ($columns) {
//   $newColumns = [];
//   foreach($columns as $key => $value) {
//     if ($key === 'date') {
//       $newColumns['sponsoring'] = 'Location sponsorisé';
//     }
//     $newColumns[$key] = $value;
//   }
//   // var_dump($newColumns);
//   return [
//     'cb' => $columns['cb'],
//     'thumbnail' => 'Miniature',
//     'title' => $columns['title'],
//     'sponsoring' => $newColumns['sponsoring'],
//     'taxonomy-logement' => $columns['taxonomy-logement'],
//     'author' => $columns['author'],
//     'comments' => $columns['comments'],
//     'date' => $columns['date']
//   ];
// });


add_filter('manage_post_posts_custom_column', function ($column, $postId) {
  if ($column === 'thumbnail') {
    the_post_thumbnail('thumbnail', $postId);
  }
  if ($column === 'sponsoring') {
    if (!empty(get_post_meta($postId, \Sponso\SponsoMetabox::META_KEY, true))) {
      $class = 'yes';
    } else {
      $class = 'no';
    }
    echo '<div class="bullet bullet-' . $class . '"></div>';
  }
}, 10, 2);