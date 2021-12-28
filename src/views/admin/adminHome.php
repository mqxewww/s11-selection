<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Espace Administrateur</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">
    Vous pouvez consulter la liste des comptes
    mais également les modifier à travers différents boutons.
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
        <a class="field button is-block is-dark is-medium" href="?create">
          Nouveau compte
          <i class="mdi mdi-account-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- ./Buttons -->

    <!-- Table -->
    <div class="column">
      <div class="box">
        <table class="table">
          <thead>
            <tr>
              <th><abbr title="Login du compte"></abbr>Login</th>
              <th><abbr title="Type du compte"></abbr>Type</th>
              <th><abbr title="Modifier le compte"></abbr>Modifier</th>
              <th><abbr title="Supprimer le compte"></abbr>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list as $account) : ?>
              <tr>
                <th><?= $account->getLogin(); ?></th>
                <td><?= $account->getType(); ?></td>
                <td>
                  <a class="field button is-block is-dark is-small" href="?update&accountId=<?= $account->getId() ?>">
                    Modifier
                    <i class="mdi mdi-account-edit" aria-hidden="true"></i>
                  </a>
                </td>
                <td>
                  <a class="field button is-block is-dark is-small" href="?delete&accountId=<?= $account->getId() ?>">
                    Supprimer
                    <i class="mdi mdi-account-minus" aria-hidden="true"></i>
                  </a>
                </td>
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