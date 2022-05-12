<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace commun - Modification du mot de passe
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez modifier votre mot de passe dans le formulaire ci-dessous.
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
<?php endif; ?>

<div class="columns is-multiline">

  <div class="column is-one-quarter">
    <div class="box">
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["WEB_URL"] . "logout" ?>">
        Se déconnecter
        <i class="mdi mdi-logout" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["WEB_URL"] ?>">
        Accueil
        <i class="mdi mdi-home" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="column">
    <form action="<?= $_ENV["WEB_URL"] . "common/updateAccountPassword?accountId=" . $account->getId() ?>" method="POST" class="box">
      <div class="field">
        <label class="label">Ancien mot de passe</label>
        <input class="input is-medium" name="oldAccountPwd" type="password" required />
      </div>

      <div class="field">
        <label class="label">Nouveau mot de passe</label>
        <input class="input is-medium" name="newAccountPwd" type="password" minlength="12" required />
      </div>

      <div class="field">
        <label class="label">Confirmation du nouveau mot de passe</label>
        <input class="input is-medium" name="newAccountPwdConf" type="password" minlength="12" required />
      </div>

      <button class="button is-block is-dark is-medium is-fullwidth" type="submit">
        Confirmer la modification
      </button>
    </form>
  </div>

</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>