<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Administrateur - Modification
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez modifier un compte en changeant une ou plusieurs informations.
  Vous pouvez également recréer un mot de passe.
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
    <form action="<?= $_ENV["PATH_TO_INDEX"] . "admin/updateAccount?accountId=" . $_GET["accountId"] ?>" method="POST" class="box">
      <input hidden name="oldAccountLog" type="text" value=<?= $account->getLogin() ?> />

      <div class="field">
        <label class="label">Identifiant</label>
        <input class="input is-medium" name="modAccountLog" type="text" value=<?= $account->getLogin() ?> minlength="4" required />
      </div>

      <div class="field">
        <label class="label">Type de compte</label>
        <div class="select is-medium is-fullwidth">
          <select name="modAccountType" required>
            <option hidden value=""></option>
            <option value="admin" <?php if ($account->getType() === "admin") echo "selected"; ?>>Admin</option>
            <option value="teacher" <?php if ($account->getType() === "teacher") echo "selected"; ?>>Professeur</option>
            <option value="secretary" <?php if ($account->getType() === "secretary") echo "selected"; ?>>Secrétaire</option>
          </select>
        </div>
      </div>

      <button class="button is-block is-dark is-medium is-fullwidth" type="submit">
        Valider les modifications
      </button>
    </form>
  </div>

</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>