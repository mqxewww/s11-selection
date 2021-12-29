<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Connexion</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">Connectez vous pour accéder à l'application.</p>
  <!-- ./Header -->

  <!-- Form -->
  <form action="" method="POST" class="box">
    <div class="field">
      <label class="label">Identifiant</label>
      <div class="control">
        <input class="input is-medium" name="accountLog" type="text" placeholder="ID" required />
      </div>
    </div>

    <div class="field">
      <label class="label">Mot de passe</label>
      <div class="control">
        <input class="input is-medium" name="accountPwd" type="password" placeholder="Pass" required />
      </div>
    </div>

    <button type="submit" class="button is-block is-dark is-medium is-fullwidth">
      Connexion
      <i class="mdi mdi-login" aria-hidden="true"></i>
    </button>
  </form>
  <!-- ./Form -->

  <!-- Errors -->
  <?php if (isset($_GET["fail"])) : ?>
    <p class="field is-size-5 has-text-red">Identifiants incorrects.</p>
  <?php endif; ?>

  <?php if (isset($_GET["afk"])) : ?>
    <p class="field is-size-5 has-text-red">Vous avez été déconnecté pour inactivité.</p>
  <?php endif; ?>
  <!-- ./Errors -->

  <!-- Footer -->
  <p class="has-text-grey">NOIZET Maxence &nbsp;·&nbsp; 2021</p>
  <!-- ./Footer -->

</div>

<?php require_once "./src/views/footer.php"; ?>