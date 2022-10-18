<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Connexion
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Connectez vous pour accéder à l'application.
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
<?php endif; ?>

<form action="<?= $_ENV["PATH_TO_INDEX"] . "authentication" ?>" method="POST" class="box">
  <div class="field">
    <label class="label">Identifiant</label>
    <input class="input is-medium" name="accountLog" type="text" required />
  </div>

  <div class="field">
    <label class="label">Mot de passe</label>
    <input class="input is-medium" name="accountPwd" type="password" required />
  </div>

  <button class="button is-block is-dark is-medium is-fullwidth" type="submit">
    Connexion
    <i class="mdi mdi-login" aria-hidden="true"></i>
  </button>
</form>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>