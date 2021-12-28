<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Espace Secrétaire</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">
    Vous pouvez consulter le classement
    et le télécharger au format csv.
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
        <a class="field button is-block is-dark is-medium" href="?download">
          Télécharger le classement
          <i class="mdi mdi-download" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- ./Buttons -->

    <!-- Table -->
    <div class="column">
      <div class="box">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th><abbr title="Numéro de grille"></abbr>ID</th>
              <th><abbr title="Nom de l'étudiant"></abbr>Nom</th>
              <th><abbr title="Prénom de l'étudiant"></abbr>Prénom</th>
              <th><abbr title="Note de l'étudiant"></abbr>Note</th>
              <th><abbr title="Commentaires de la grille"></abbr>Commentaires</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list as $grid) : ?>
              <tr>
                <th><?= $grid->getNumber(); ?></th>
                <td><?= $grid->getName(); ?></td>
                <td><?= $grid->getFirstname(); ?></td>
                <th><?= $grid->getMark(); ?></th>
                <td><?= $grid->getComment(); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- ./Table -->

  </div>
  <!-- ./Main content -->

</div>

<?php require_once "./src/views/footer.php"; ?>