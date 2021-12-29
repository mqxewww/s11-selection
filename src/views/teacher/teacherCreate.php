<?php require_once "./src/views/header.php"; ?>

<div class="column is-12">

  <!-- Header -->
  <h3 class="title has-text-black">[S11] Selection BTS - Espace Professeur - Création</h3>
  <hr class="login-hr">
  <p class="subtitle has-text-black">
    Vous pouvez créer une grille en complétant l'ensemble des informations demandées.
  </p>
  <?php if (isset($_GET["failed"])) : ?>
    <p class="field is-size-5 has-text-red">Veuillez vérifier les informations rentrées.</p>
  <?php endif; ?>
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
        <a class="field button is-block is-dark is-medium" href="?">
          Accueil
          <i class="mdi mdi-home" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <!-- ./Buttons -->

    <!-- Form -->
    <div class="column">
      <form action="" method="POST" class="box">
        <div class="field">
          <label class="label">Numéro de grille</label>
          <div class="control">
            <input class="input is-medium" name="newGridNum" type="text" placeholder="#ID" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Nom de l'étudiant</label>
          <div class="control">
            <input class="input is-medium" name="newGridName" type="text" placeholder="Nom" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Prénom de l'étudiant</label>
          <div class="control">
            <input class="input is-medium" name="newGridFirstname" type="text" placeholder="Prénom" required />
          </div>
        </div>

        <div class="field">
          <label class="label">Diplome de l'étudiant</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridDiploma" required>
                <option hidden value=""></option>
                <option value=12>ES/S</option>
                <option value=10>STMG</option>
                <option value=8>PRO</option>
                <option value=9>L</option>
                <option value=5>Autre</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Travail de l'étudiant</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridWork" required>
                <option hidden value=""></option>
                <option value=1>Correct</option>
                <option value=-1>Incorrect</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Taux d'absence de l'étudiant</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridAbs" required>
                <option hidden value=""></option>
                <option value=0>Bas</option>
                <option value=-2>Élevé</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Attitude / Comportement de l'étudiant</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridAtt" required>
                <option hidden value=""></option>
                <option value=0>Correct</option>
                <option value=-3>Incorrect</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Études supérieures ?</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridStudy" required>
                <option hidden value=""></option>
                <option value=1>Oui</option>
                <option value=0>Non</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Avis du professeur principal</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridPpview" required>
                <option hidden value=""></option>
                <option value=2>B</option>
                <option value=1>AB</option>
                <option value=0>Insuffisant</option>
                <option value=-2>Négatif</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Avis du proviseur</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridProview" required>
                <option hidden value=""></option>
                <option value=2>B</option>
                <option value=1>AB</option>
                <option value=0>Insuffisant</option>
                <option value=-2>Négatif</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Qualité lettre de motivation</label>
          <div class="control">
            <div class="select is-medium is-fullwidth">
              <select name="newGridCoverletter" required>
                <option hidden value=""></option>
                <option value=2>B</option>
                <option value=1>AB</option>
                <option value=0>Insuffisant</option>
                <option value=-2>Négatif</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Remarques</label>
          <div class="control">
            <textarea name="newGridComment" class="textarea is-medium is-fullwidth"></textarea>
          </div>
        </div>

        <button type="submit" class="button is-block is-dark is-medium is-fullwidth">
          Valider la création
        </button>
      </form>
    </div>
    <!-- ./Form -->

  </div>
  <!-- ./Main content -->

  <!-- Footer -->
  <p class="has-text-grey">NOIZET Maxence &nbsp;·&nbsp; 2021</p>
  <!-- ./Footer -->

</div>

<?php require_once "./src/views/footer.php"; ?>