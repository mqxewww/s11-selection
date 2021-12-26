<?php require_once "./src/views/header.php"; ?>

<body>
  <?php require_once "./src/views/navbar.php"; ?>

  <h2>Espace professeur - Modification d'une grille</h2>

  <form action="" method="POST">
    <label for="modGridNum">Numéro de grille :</label>
    <input type="text" name="modGridNum" value=<?= $grid->getNumber() ?> required>

    <label for="modGridName">Nom de l'étudiant :</label>
    <input type="text" name="modGridName" value=<?= $grid->getName() ?> required>

    <label for="modGridFirstname">Prénom de l'étudiant :</label>
    <input type="text" name="modGridFirstname" value=<?= $grid->getFirstname() ?> required>

    <label for="modGridDiploma">Diplôme de l'étudiant :</label>
    <select name="modGridDiploma" required>
      <option hidden value="">Choisissez une option</option>
      <option value=12 <?php if ($grid->getDiploma() === 12) echo "selected"; ?>>ES/S</option>
      <option value=10 <?php if ($grid->getDiploma() === 10) echo "selected"; ?>>STMG</option>
      <option value=8 <?php if ($grid->getDiploma() === 8) echo "selected"; ?>>PRO</option>
      <option value=9 <?php if ($grid->getDiploma() === 9) echo "selected"; ?>>L</option>
      <option value=5 <?php if ($grid->getDiploma() === 5) echo "selected"; ?>>Autre</option>
    </select>

    <label for="modGridWork">Travail de l'étudiant :</label>
    <select name="modGridWork" required>
      <option hidden value="">Choisissez une option</option>
      <option value=1 <?php if ($grid->getWork() === 1) echo "selected"; ?>>Correct</option>
      <option value=-1 <?php if ($grid->getWork() === -1) echo "selected"; ?>>Incorrect</option>
    </select>

    <label for="modGridAbs">Taux d'absence de l'étudiant :</label>
    <select name="modGridAbs" required>
      <option hidden value="">Choisissez une option</option>
      <option value=0 <?php if ($grid->getAbsence() === 0) echo "selected"; ?>>Bas</option>
      <option value=-2 <?php if ($grid->getAbsence() === -2) echo "selected"; ?>>Élevé</option>
    </select>

    <label for="modGridAtt">Attitude / Comportement de l'étudiant :</label>
    <select name="modGridAtt" required>
      <option hidden value="">Choisissez une option</option>
      <option value=0 <?php if ($grid->getAttitude() === 0) echo "selected"; ?>>Correct</option>
      <option value=-3 <?php if ($grid->getAttitude() === -3) echo "selected"; ?>>Incorrect</option>
    </select>

    <label for="modGridStudy">Études supérieures ? :</label>
    <select name="modGridStudy" required>
      <option hidden value="">Choisissez une option</option>
      <option value=1 <?php if ($grid->getStudy() === 1) echo "selected"; ?>>Oui</option>
      <option value=0 <?php if ($grid->getStudy() === 0) echo "selected"; ?>>Non</option>
    </select>

    <label for="modGridPpview">Avis du professeur principal :</label>
    <select name="modGridPpview" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2 <?php if ($grid->getPpview() === 2) echo "selected"; ?>>B</option>
      <option value=1 <?php if ($grid->getPpview() === 1) echo "selected"; ?>>AB</option>
      <option value=0 <?php if ($grid->getPpview() === 0) echo "selected"; ?>>Insuffisant</option>
      <option value=-2 <?php if ($grid->getPpview() === -2) echo "selected"; ?>>Négatif</option>
    </select>

    <label for="modGridProview">Avis du proviseur :</label>
    <select name="modGridProview" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2 <?php if ($grid->getProview() === 2) echo "selected"; ?>>B</option>
      <option value=1 <?php if ($grid->getProview() === 1) echo "selected"; ?>>AB</option>
      <option value=0 <?php if ($grid->getProview() === 0) echo "selected"; ?>>Insuffisant</option>
      <option value=-2 <?php if ($grid->getProview() === -2) echo "selected"; ?>>Négatif</option>
    </select>

    <label for="modGridCoverletter">Qualité lettre de motivation :</label>
    <select name="modGridCoverletter" required>
      <option hidden value="">Choisissez une option</option>
      <option value=2 <?php if ($grid->getCoverletter() === 2) echo "selected"; ?>>B</option>
      <option value=1 <?php if ($grid->getCoverletter() === 1) echo "selected"; ?>>AB</option>
      <option value=0 <?php if ($grid->getCoverletter() === 0) echo "selected"; ?>>Insuffisant</option>
      <option value=-2 <?php if ($grid->getCoverletter() === -2) echo "selected"; ?>>Négatif</option>
    </select>

    <label for="modGridComment">Remarques :</label>
    <textarea name="modGridComment" rows=10 cols=65><?= $grid->getComment() ?></textarea>

    <button type="submit">Enregistrer</button>
  </form>

  <?php if (isset($_GET["failed"])) : ?>
    <p>Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
</body>

</html>