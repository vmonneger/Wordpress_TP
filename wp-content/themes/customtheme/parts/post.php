<div class="col-sm-4">
  <div class="card" style="width: 18rem;">
    <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('medium', ['class' => 'card-img-top', 'alt' => '']); ?>
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <h6 class="ard-subtitle mb-2 text-muted"><?php the_category() ?></h6>
        <?php the_terms(get_the_ID(), 'logement') ?>
        <p class="card-text">
          <?php the_content() ?>
        </p>
      </div>
    </a>
  </div>
</div>