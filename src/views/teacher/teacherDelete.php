<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Espace Professeur - Suppression</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">
    Voulez vous vraiment supprimer la grille
    <strong class="has-text-black"><?= $grid->getNumber() ?></strong> ?
  </p>
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
        <a class="field button is-block is-dark is-medium" href="/">
          Accueil
          <i class="mdi mdi-home" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- ./Buttons -->

    <!-- Form -->
    <div class="column">
      <form action="" method="POST" class="box">
        <input type="text" name="delGridId" value=<?= $grid->getId() ?> hidden>

        <button type="submit" class="button is-block is-dark is-medium is-fullwidth">
          Valider la suppression
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