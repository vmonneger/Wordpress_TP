<?php
/** 
 * Plugin Name: Aldi Manage Column
 */

add_filter('manage_post_posts_columns', function ($columns) {
  $newColumns = [];
  foreach($columns as $key => $value) {
    if ($key === 'date') {
      $newColumns['sponsoring'] = 'Location sponsorisé';
    }
    $newColumns[$key] = $value;
  }
  // var_dump($newColumns);
  return [
    'cb' => $columns['cb'],
    'thumbnail' => 'Miniature',
    'title' => $columns['title'],
    'sponsoring' => $newColumns['sponsoring'],
    'taxonomy-logement' => $columns['taxonomy-logement'],
    'author' => $columns['author'],
    'comments' => $columns['comments'],
    'date' => $columns['date']
  ];
});