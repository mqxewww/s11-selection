<?php require_once "./src/views/components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Professeur - Suppression
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Voulez vous vraiment supprimer la grille
  <strong class="has-text-black"><?= $grid->getNumber() ?></strong> ?
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
<?php endif; ?>

<div class="columns is-multiline">

  <div class="column is-one-quarter">
    <div class="box">
      <a class="field button is-block is-dark is-medium" href="?logout">
        Se déconnecter
        <i class="mdi mdi-logout" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="<?= $_SERVER["PHP_SELF"] ?>">
        Accueil
        <i class="mdi mdi-home" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="column">
    <form action="" method="POST" class="box">
      <input type="text" name="delGridId" value=<?= $grid->getId() ?> hidden>

      <button class="button is-block is-dark is-medium is-fullwidth" name="deleteGrid" type="submit">
        Valider la suppression
      </button>
    </form>
  </div>

</div>

<p class="has-text-grey">
  NOIZET Maxence · 2021
</p>

<?php require_once "./src/views/components/footer.php"; ?>