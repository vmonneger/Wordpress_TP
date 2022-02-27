<form class="d-flex" action="<?= esc_url(home_url('/')) ?>">
  <input 
    class="form-control me-2" 
    type="search" 
    placeholder="Rechercher" 
    aria-label="Search" 
    value="<?= get_search_query(); ?>" 
  >
  <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>