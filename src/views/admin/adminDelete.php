<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace administrateur - Suppression d'un compte</h2>
  <p>Voulez vous vraiment supprimer le compte <?= $account->getLogin() ?> ?</p>

  <form action="" method="POST">
    <input type="text" name="delAccountId" value=<?= $account->getId() ?> hidden>

    <button type="submit">Supprimer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Une erreur est survenue, veuillez réessayer.</p>
  <?php endif; ?>
</body>

</html>