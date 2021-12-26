<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace professeur - Création d'une grille</h2>

  <form action="" method="POST">
    <label for="newGridNum">Numéro de grille :</label>
    <input type="text" name="newGridNum" required>

    <label for="newGridName">Nom de l'étudiant :</label>
    <input type="text" name="newGridName" required>

    <label for="newGridFirstname">Prénom de l'étudiant :</label>
    <input type="text" name="newGridFirstname" required>

    <label for="newGridDiploma">Diplôme de l'étudiant :</label>
    <select name="newGridDiploma" required>
      <option hidden value="">Choisissez une option</option>
      <option value=12>ES/S</option>
      <option value=10>STMG</option>
      <option value=8>PRO</option>
      <option value=9>L</option>
      <option value=5>Autre</option>
    </select>

    <label for="newGridWork">Travail de l'étudiant :</label>
    <select name="newGridWork" required>
      <option hidden value="">Choisissez une option</option>
      <option value=1>Correct</option>
      <option value=-1>Incorrect</option>
    </select>

    <label for="newGridAbs">Taux d'absence de l'étudiant :</label>
    <select name="newGridAbs" required>
      <option hidden value="">Choisissez une option</option>
      <option value=0>Bas</option>
      <option value=-2>Élevé</option>
    </select>

    <label for="newGridAtt">Attitude / Comportement de l'étudiant :</label>
    <select name="newGridAtt" required>
      <option hidden value="">Choisissez une option</option>
      <option value=0>Correct</option>
      <option value=-3>Incorrect</option>
    </select>

    <label for="newGridStudy">Études supérieures ? :</label>
    <select name="newGridStudy" required>
      <option hidden value="">Choisissez une option</option>
      <option value=1>Oui</option>
      <option value=0>Non</option>
    </select>

    <label for="newGridPpview">Avis du professeur principal :</label>
    <select name="newGridPpview" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2>B</option>
      <option value=1>AB</option>
      <option value=0>Insuffisant</option>
      <option value=-2>Négatif</option>
    </select>

    <label for="newGridProview">Avis du proviseur :</label>
    <select name="newGridProview" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2>B</option>
      <option value=1>AB</option>
      <option value=0>Insuffisant</option>
      <option value=-2>Négatif</option>
    </select>

    <label for="newGridCoverletter">Qualité lettre de motivation :</label>
    <select name="newGridCoverletter" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2>B</option>
      <option value=1>AB</option>
      <option value=0>Insuffisant</option>
      <option value=-2>Négatif</option>
    </select>

    <label for="newGridComment">Remarques :</label>
    <textarea name="newGridComment" rows=10 cols=65></textarea>

    <button type="submit">Enregistrer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
</body>

</html>