<?php require_once "./src/views/header.php"; ?>

<body>
  <a type="submit" href="?logout">Se déconnecter</a>
  <h2>Espace secrétaire - Accueil</h2>

  <a type="submit" href="?download">Télécharger le classement</a>

  <table>
    <thead>
      <tr>
        <th>Numéro de grille</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Note</th>
        <th>Commentaires</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $grid) : ?>
        <tr>
          <td><?= $grid->getNumber(); ?></td>
          <td><?= $grid->getName(); ?></td>
          <td><?= $grid->getFirstname(); ?></td>
          <td><?= $grid->getMark(); ?></td>
          <td><?= $grid->getComment(); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>