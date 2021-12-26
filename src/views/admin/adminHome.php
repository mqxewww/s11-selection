<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace administrateur - Accueil</h2>

  <table>
    <thead>
      <tr>
        <th>Login</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $account) : ?>
        <tr>
          <td><?= $account->getLogin(); ?></td>
          <td><?= $account->getType(); ?></td>
          <td><a type="submit" href="?update&accountId=<?= $account->getId() ?>">Modifier</a></td>
          <td><a type="submit" href="?delete&accountId=<?= $account->getId() ?>">Supprimer</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php if (isset($_GET["created"])) : ?>
    <p>Compte créé avec succès !</p>
  <?php endif; ?>

  <?php if (isset($_GET["modified"])) : ?>
    <p>Compte modifié avec succès !</p>
  <?php endif; ?>

  <?php if (isset($_GET["deleted"])) : ?>
    <p>Compte supprimé avec succès !</p>
  <?php endif; ?>
</body>

</html>