<?php get_header(); ?>
  <?php while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
  <?php endwhile; ?>
  <h1>La page principale où il y aura la search bar !</h1>
  <a href="<?= get_post_type_archive_link('post') ?>">Voir toutes les offres !</a>
  <?= get_search_form(); ?>
<?php get_footer(); ?>