<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace professeur - Suppression d'une grille</h2>
  <p>Voulez vous vraiment supprimer la grille <?= $grid->getNumber() ?> ?</p>

  <form action="" method="POST">
    <input hidden type="text" name="delGridId" value=<?= $grid->getId() ?>>
    <button type="submit">Supprimer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Une erreur est survenue, veuillez réessayer.</p>
  <?php endif; ?>
</body>

</html>