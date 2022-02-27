    </div>
    <footer class="fixed-footer text-center text-lg-start" style="background-color: #121212;">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Footer text</h5>
            <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'navbar-nav']); ?>
          </div>
        </div>
      </div>
      <div class="text-center p-3" style="background-color: #121212;">
        © 2022 Copyright:
        <a class="text-dark" href="">Ald'BnB</a>
      </div>
    </footer>
    <?php wp_footer() ?>
  </body>
</html>