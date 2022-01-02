<?php require_once "./src/views/components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Administrateur - Accueil
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez consulter la liste des comptes et
  également la modifier à partir de différents boutons.
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
      <a class="field button is-block is-dark is-medium" href="?logout">
        Se déconnecter
        <i class="mdi mdi-logout" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="<?= $_SERVER["PHP_SELF"] ?>">
        Accueil
        <i class="mdi mdi-home" aria-hidden="true"></i>
      </a>
      <a class="field button is-block is-dark is-medium" href="?create">
        Nouveau compte
        <i class="mdi mdi-account-plus" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="column">
    <div class="box">
      <table class="table is-fullwidth">
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

</div>

<p class="has-text-grey">
  NOIZET Maxence · 2021
</p>

<?php require_once "./src/views/components/footer.php"; ?>