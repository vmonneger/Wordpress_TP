<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <?php if(get_post_meta(get_the_ID(), Sponso\SponsoMetaBox::META_KEY, true) === '1'): ?>
        <div class="alert alert-info">
            C'est une location sponso
        </div>
    <?php endif; ?>

    <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto;">

    <p><?php the_content(); ?></p>

    <?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
    ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?> 