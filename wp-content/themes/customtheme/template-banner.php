<?php
/**
 * Template Name: Page avec bannière
 */
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <p>Ca c'est la bannière, c'est une page spécifique dans le template</p>
  <h1><?php the_title(); ?></h1>
  <img src="<?php the_post_thumbnail_url() ?>" alt="">
  <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
<?php get_footer(); ?> 