<?php get_header(); ?>
  <h1 class="mb-5">Bienvenue sur Ald'BnB</h1>
  <?= get_search_form(); ?>
  <div class="text-center mt-5">
    <a href="<?= get_post_type_archive_link('post') ?>" class="btn btn-primary">Voir toutes les offres !</a>
  </div>

<?php get_footer(); ?>