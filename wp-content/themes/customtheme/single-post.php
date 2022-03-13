<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <?php if(get_post_meta(get_the_ID(), Sponso\SponsoMetaBox::META_KEY, true) === '1'): ?>
        <div class="alert alert-info">
            C'est un article sponso
        </div>
    <?php endif; ?>

    <img src="<?php the_post_thumbnail_url() ?>" alt="">
    <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
<?php get_footer(); ?> 