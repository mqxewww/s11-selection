<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace professeur - Accueil</h2>

  <table>
    <thead>
      <tr>
        <th>Numéro de grille</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $grid) : ?>
        <tr>
          <td><?= $grid->getNumber(); ?></td>
          <td><?= $grid->getName(); ?></td>
          <td><?= $grid->getFirstname(); ?></td>
          <td><?= $grid->getMark(); ?></td>
          <td><a type="submit" href="?update&gridId=<?= $grid->getId() ?>">Modifier</a></td>
          <td><a type="submit" href="?delete&gridId=<?= $grid->getId() ?>">Supprimer</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php if (isset($_GET["created"])) : ?>
    <p>Grille créé avec succès !</p>
  <?php endif; ?>
  <?php if (isset($_GET["modified"])) : ?>
    <p>Grille modifiée avec succès !</p>
  <?php endif; ?>
  <?php if (isset($_GET["deleted"])) : ?>
    <p>Grille supprimée avec succès !</p>
  <?php endif; ?>
</body>

</html>