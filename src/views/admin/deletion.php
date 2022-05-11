<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Administrateur - Suppression
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Voulez vous vraiment supprimer le compte
  <strong class="has-text-black"><?= $account->getLogin() ?></strong> ?
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
    <form action="<?= $_ENV["WEB_URL"] . "admin/deleteAccount?accountId=" . $_GET["accountId"] ?>" method="POST" class="box">
      <input type="text" name="delAccountId" value=<?= $account->getId() ?> hidden>

      <button class="button is-block is-dark is-medium is-fullwidth" type="submit">
        Valider la suppression
      </button>
    </form>
  </div>

</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>