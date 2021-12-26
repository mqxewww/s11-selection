<?php require_once "./src/views/header.php"; ?>

<body>
  <h2>Selection BTS - Connexion</h2>

  <form action="" method="POST">
    <label for="accountLog">ID utilisateur :</label>
    <input type="text" name="accountLog" required>

    <label for="accountPwd">Mot de passe :</label>
    <input type="password" name="accountPwd" required>

    <button type="submit">Connexion</button>
  </form>

  <?php if (isset($_GET["fail"])) : ?>
    <p>Identifiants incorrects.</p>
  <?php endif; ?>

  <?php if (isset($_GET["afk"])) : ?>
    <p>Vous avez été déconnecté pour inactivité.</p>
  <?php endif; ?>

  <p>NOIZET Maxence - 2021</p>
</body>

</html>