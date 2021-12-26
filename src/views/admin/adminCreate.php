<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace administrateur - Création d'un compte</h2>

  <form action="" method="POST">
    <label for="newAccountLog">ID utilisateur :</label>
    <input type="text" name="newAccountLog" required>

    <label for="newAccountPwd">Mot de passe :</label>
    <input type="password" name="newAccountPwd" minlength="12" required>

    <label for="newAccountPwdConf">Confirmation mot de passe :</label>
    <input type="password" name="newAccountPwdConf" minlength="12" required>

    <label for="newAccountType">Type de compte :</label>
    <select name="newAccountType" required>
      <option hidden value=""></option>
      <option value="admin">Admin</option>
      <option value="teacher">Professeur</option>
      <option value="secretary">Secrétaire</option>
    </select>

    <button type="submit">Enregistrer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
</body>

</html>