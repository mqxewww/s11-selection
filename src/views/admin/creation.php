<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Administrateur - Création
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez créer un compte en complétant l'ensemble des informations demandées.
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
<?php endif; ?>

<div class="columns is-multiline">

  <div class="column is-one-quarter">
    <div class="box">
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["PATH_TO_INDEX"] . "logout" ?>">
        Se déconnecter
        <i class="mdi mdi-logout" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["PATH_TO_INDEX"] ?>">
        Accueil
        <i class="mdi mdi-home" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="column">
    <form action="<?= $_ENV["PATH_TO_INDEX"] . "admin/insertAccount" ?>" method="POST" class="box">
      <div class="field">
        <label class="label">Identifiant</label>
        <input class="input is-medium" name="newAccountLog" type="text" minlength="4" required />
      </div>

      <div class="field">
        <label class="label">Mot de passe</label>
        <input class="input is-medium" name="newAccountPwd" type="password" minlength="12" required />
      </div>

      <div class="field">
        <label class="label">Confirmation du mot de passe</label>
        <input class="input is-medium" name="newAccountPwdConf" type="password" minlength="12" required />
      </div>

      <div class="field">
        <label class="label">Type de compte</label>
        <div class="select is-fullwidth">
          <select name="newAccountType" required>
            <option hidden value=""></option>
            <option value="admin">Admin</option>
            <option value="teacher">Professeur</option>
            <option value="secretary">Secrétaire</option>
          </select>
        </div>
      </div>

      <button class="button is-block is-dark is-medium is-fullwidth" type="submit">
        Valider la création
      </button>
    </form>
  </div>

</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>