<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="row">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
          <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('medium', ['class' => 'card-img-top', 'alt' => '']); ?>
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text">
                <?php the_content() ?>
              </p>
            </div>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <h1>Pas d'articles</h1>
<?php endif; ?>
<?php get_footer(); ?>