<?php get_header(); ?>

<?php $logements = get_terms(['taxonomy' => 'logement']); ?>
<ul class="nav nav-pills mb-3">
  <?php foreach($logements as $logement): ?>
  <li class="nav-item">
    <a href="<?= get_term_link($logement) ?>" class="nav-link <?= is_tax('logement', $logement->term_id) ? 'active' : '' ?>">
      <?= $logement->name ?>
    </a>
  </li>
  <?php endforeach; ?>
</ul>

<?php if ( have_posts() ) : ?>
  <div class="row">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="col-sm-4">
        <?php get_template_part('parts/post'); ?>
      </div>
    <?php endwhile; ?>

  </div>
  <?= App\pagination(); ?>
<?php else: ?>
  <h1>Pas d'articles</h1>
<?php endif; ?>
<?php get_footer(); ?>