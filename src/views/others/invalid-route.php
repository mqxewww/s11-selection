<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Erreur 500
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Erreur interne, la route possède des paramètres invalides.
</p>

<div class="box">
  <button class="field button is-block is-dark is-medium is-fullwidth" onclick="location.href='/'">
    Retourner à l'accueil
    <i class="mdi mdi-home" aria-hidden="true"></i>
  </button>
  <button class="field button is-block is-dark is-medium is-fullwidth" onclick="location.href='/logout'">
    Déconnexion
    <i class="mdi mdi-logout" aria-hidden="true"></i>
  </button>
</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>