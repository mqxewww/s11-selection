<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Espace Administrateur - Modification</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">
    Vous pouvez modifier un compte en changeant une ou plusieurs informations.
    Vous pouvez également recréer un mot de passe.
  </p>
  <?php if (isset($_GET["failed"])) : ?>
    <p class="field is-size-5 has-text-red">Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
  <!-- ./Header -->

  <!-- Main content -->
  <div class="columns is-multiline">

    <!-- Buttons -->
    <div class="column is-one-quarter">
      <div class="box">
        <a class="field button is-block is-dark is-medium" href="?logout">
          Se déconnecter
          <i class="mdi mdi-logout" aria-hidden="true"></i>
        </a>
        <a class="field button is-block is-dark is-medium" href="?">
          Accueil
          <i class="mdi mdi-home" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- ./Buttons -->

    <!-- Form -->
    <div class="column">
      <form action="" method="POST" class="box">
        <div class="field">
          <label class="label">Identifiant</label>
          <div class="control">
            <input class="input is-medium" name="modAccountLog" type="text" value=<?= $account->getLogin() ?> placeholder="ID" minlength="4" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Mot de passe</label>
          <div class="control">
            <input class="input is-medium" name="modAccountPwd" type="password" placeholder="Pass" minlength="8" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Confirmation du mot de passe</label>
          <div class="control">
            <input class="input is-medium" name="modAccountPwdConf" type="password" placeholder="Pass" minlength="8" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Type de compte</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="modAccountType" required>
                <option hidden value=""></option>
                <option value="admin" <?php if ($account->getType() === "admin") echo "selected"; ?>>Admin</option>
                <option value="teacher" <?php if ($account->getType() === "teacher") echo "selected"; ?>>Professeur</option>
                <option value="secretary" <?php if ($account->getType() === "secretary") echo "selected"; ?>>Secrétaire</option>
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="button is-block is-dark is-medium is-fullwidth">
          Valider les modifications
        </button>
      </form>
    </div>
    <!-- ./Form -->

  </div>
  <!-- ./Main content -->

  <!-- Footer -->
  <p class="has-text-grey">NOIZET Maxence &nbsp;·&nbsp; 2021</p>
  <!-- ./Footer -->

</div>

<?php require_once "./src/views/footer.php"; ?>