<?php require_once "./src/views/components/header.php"; ?>

<h3 class="title has-text-black">
  [S11] Selection BTS - Espace Professeur - Modification
</h3>
<hr class="login-hr" />
<p class="subtitle has-text-black">
  Vous pouvez modifier une grille en changeant une ou plusieurs informations.
</p>
<?php if (isset($_SESSION["error"])) : ?>
  <p class="field is-size-5 has-text-red"><?= htmlspecialchars($_SESSION["error"]); ?></p>
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
    </div>
  </div>

  <div class="column">
    <form action="" method="POST" class="box">
      <input hidden name="oldGridNum" type="text" value="<?= $grid->getNumber() ?>" />

      <div class="field">
        <label class="label">Numéro de grille</label>
        <input class="input is-medium" name="modGridNum" value="<?= $grid->getNumber() ?>" type="text" required />
      </div>

      <div class="field">
        <label class="label">Nom de l'étudiant</label>
        <input class="input is-medium" name="modGridName" value="<?= $grid->getName() ?>" type="text" required />
      </div>

      <div class="field">
        <label class="label">Prénom de l'étudiant</label>
        <input class="input is-medium" name="modGridFirstname" value="<?= $grid->getFirstname() ?>" type="text" required />
      </div>

      <div class="field">
        <label class="label">Diplome de l'étudiant</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridDiploma" required>
            <option hidden value=""></option>
            <option value="12" <?php if ($grid->getDiploma() === 12) echo "selected"; ?>>ES/S</option>
            <option value="10" <?php if ($grid->getDiploma() === 10) echo "selected"; ?>>STMG</option>
            <option value="8" <?php if ($grid->getDiploma() === 8) echo "selected"; ?>>PRO</option>
            <option value="9" <?php if ($grid->getDiploma() === 9) echo "selected"; ?>>L</option>
            <option value="5" <?php if ($grid->getDiploma() === 5) echo "selected"; ?>>Autre</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Travail de l'étudiant</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridWork" required>
            <option hidden value=""></option>
            <option value="1" <?php if ($grid->getWork() === 1) echo "selected"; ?>>Correct</option>
            <option value="-1" <?php if ($grid->getWork() === -1) echo "selected"; ?>>Incorrect</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Taux d'absence de l'étudiant</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridAbs" required>
            <option hidden value=""></option>
            <option value="0.0" <?php if ($grid->getAbsence() === 0) echo "selected"; ?>>Bas</option>
            <option value="-2" <?php if ($grid->getAbsence() === -2) echo "selected"; ?>>Élevé</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Attitude / Comportement de l'étudiant</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridAtt" required>
            <option hidden value=""></option>
            <option value="0.0" <?php if ($grid->getAttitude() === 0) echo "selected"; ?>>Correct</option>
            <option value="-3" <?php if ($grid->getAttitude() === -3) echo "selected"; ?>>Incorrect</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Études supérieures ?</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridStudy" required>
            <option hidden value=""></option>
            <option value="1" <?php if ($grid->getStudy() === 1) echo "selected"; ?>>Oui</option>
            <option value="0.0" <?php if ($grid->getStudy() === 0) echo "selected"; ?>>Non</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Avis du professeur principal</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridPpview" required>
            <option hidden value=""></option>
            <option value="2" <?php if ($grid->getPpview() === 2) echo "selected"; ?>>B</option>
            <option value="1" <?php if ($grid->getPpview() === 1) echo "selected"; ?>>AB</option>
            <option value="0.0" <?php if ($grid->getPpview() === 0) echo "selected"; ?>>Insuffisant</option>
            <option value="-2" <?php if ($grid->getPpview() === -2) echo "selected"; ?>>Négatif</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Avis du proviseur</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridProview" required>
            <option hidden value=""></option>
            <option value="2" <?php if ($grid->getProview() === 2) echo "selected"; ?>>B</option>
            <option value="1" <?php if ($grid->getProview() === 1) echo "selected"; ?>>AB</option>
            <option value="0.0" <?php if ($grid->getProview() === 0) echo "selected"; ?>>Insuffisant</option>
            <option value="-2" <?php if ($grid->getProview() === -2) echo "selected"; ?>>Négatif</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Qualité lettre de motivation</label>
        <div class="select is-medium is-fullwidth">
          <select name="modGridCoverletter" required>
            <option hidden value=""></option>
            <option value="2" <?php if ($grid->getCoverletter() === 2) echo "selected"; ?>>B</option>
            <option value="1" <?php if ($grid->getCoverletter() === 1) echo "selected"; ?>>AB</option>
            <option value="0.0" <?php if ($grid->getCoverletter() === 0) echo "selected"; ?>>Insuffisant</option>
            <option value="-2" <?php if ($grid->getCoverletter() === -2) echo "selected"; ?>>Négatif</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label">Remarques</label>
        <textarea name="modGridComment" class="textarea is-medium is-fullwidth"><?= $grid->getComment() ?></textarea>
      </div>

      <button class="button is-block is-dark is-medium is-fullwidth" name="updateGrid" type="submit">
        Valider la création
      </button>
    </form>
  </div>

</div>

<p class="has-text-grey">
  NOIZET Maxence · 2021
</p>

<?php require_once "./src/views/components/footer.php"; ?>