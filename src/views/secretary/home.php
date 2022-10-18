<?php require_once BASE_VIEW_PATH . "components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Secrétaire - Accueil
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez consulter le classement
  et le télécharger au format csv.
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
<?php endif; ?>
<?php if (isset($_SESSION["success"])) : ?>
  <p class="field is-size-5 has-text-green"><?= htmlspecialchars($_SESSION["success"]); ?></p>
<?php endif; ?>

<div class="columns is-multiline">

  <div class="column is-one-quarter">
    <div class="box">
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["PATH_TO_INDEX"] . "logout" ?>">
        Se déconnecter
        <i class="mdi mdi-logout" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="<?= $_ENV["PATH_TO_INDEX"] . "secretary/download" ?>">
        Classement format CSV
        <i class="mdi mdi-download" aria-hidden="true"></i>
      </a>
    </div>
  </div>

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

</div>

<div class="buttons are-small is-centered">
  <?php if (isset($account)) : ?>
    <a class="button" href="<?= $_ENV["PATH_TO_INDEX"] . "common/change-password?accountId=" . $account->getId() ?>">
      Changer mon mot de passe
    </a>
  <?php endif; ?>
</div>

<?php require_once BASE_VIEW_PATH . "components/footer.php"; ?>