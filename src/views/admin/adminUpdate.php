<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace administrateur - Modification d'un compte</h2>

  <form action="" method="POST">
    <label for="newAccountLog">ID utilisateur :</label>
    <input type="text" name="modAccountLog" value=<?= $account->getLogin() ?> required>

    <label for="newAccountLog">Nouveau mot de passe :</label>
    <input type="password" name="modAccountPwd" minlength="12" required>

    <label for="newAccountLog">Confirmation mot de passe :</label>
    <input type="password" name="modAccountPwdConf" minlength="12" required>

    <label for="modAccountType">Type de compte :</label>
    <select name="modAccountType" required>
      <option hidden value=""></option>
      <option value="admin" <?php if ($account->getType() === "admin") echo "selected"; ?>>Admin</option>
      <option value="teacher" <?php if ($account->getType() === "teacher") echo "selected"; ?>>Professeur</option>
      <option value="secretary" <?php if ($account->getType() === "secretary") echo "selected"; ?>>Secrétaire</option>
    </select>

    <button type="submit">Enregistrer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
</body>

</html>