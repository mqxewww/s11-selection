<?php

/*
* "create" page redirection controller :
* Create a new grid
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {
  !empty($_POST["newGridNum"])
    ? $num = htmlspecialchars($_POST["newGridNum"])
    : throw new Exception("`Numéro de grille` est manquant.");

  !empty($_POST["newGridName"])
    ? $name = htmlspecialchars($_POST["newGridName"])
    : throw new Exception("`Nom de l'étudiant` est manquant.");

  !empty($_POST["newGridFirstname"])
    ? $firstname = htmlspecialchars($_POST["newGridFirstname"])
    : throw new Exception("`Prénom de l'étudiant` est manquant.");

  !empty($_POST["newGridDiploma"])
    ? $diploma = htmlspecialchars($_POST["newGridDiploma"])
    : throw new Exception("`Diplome de l'étudiant` est manquant.");

  !empty($_POST["newGridWork"])
    ? $work = htmlspecialchars($_POST["newGridWork"])
    : throw new Exception("`Travail de l'étudiant` est manquant.");

  !empty($_POST["newGridAbs"])
    ? $abs = htmlspecialchars($_POST["newGridAbs"])
    : throw new Exception("`Taux d'absence de l'étudiant` est manquant.");

  !empty($_POST["newGridAtt"])
    ? $att = htmlspecialchars($_POST["newGridAtt"])
    : throw new Exception("`Attitude / Comportement de l'étudiant` est manquant.");

  !empty($_POST["newGridStudy"])
    ? $study = htmlspecialchars($_POST["newGridStudy"])
    : throw new Exception("`Études supérieures ?` est manquant.");

  !empty($_POST["newGridPpview"])
    ? $ppview = htmlspecialchars($_POST["newGridPpview"])
    : throw new Exception("`Avis du professeur principal` est manquant.");

  !empty($_POST["newGridProview"])
    ? $proview = htmlspecialchars($_POST["newGridProview"])
    : throw new Exception("`Avis du proviseur` est manquant.");

  !empty($_POST["newGridCoverletter"])
    ? $coverletter = htmlspecialchars($_POST["newGridCoverletter"])
    : throw new Exception("`Qualité lettre de motivation` est manquant.");

  $comment = htmlspecialchars($_POST["newGridComment"]);

  $grid = new Grid([
    "number" => $num,
    "name" => $name,
    "firstname" => $firstname,
    "diploma" => $diploma,
    "work" => $work,
    "absence" => $abs,
    "attitude" => $att,
    "study" => $study,
    "ppview" => $ppview,
    "proview" => $proview,
    "coverletter" => $coverletter,
    "comment" => $comment,
    "mark" => $diploma + $work + $abs + $att + $study + $ppview + $proview + $coverletter
  ]);

  # If login is already taken
  if (!$manager->isNumberAvailable($grid->getNumber())) {
    throw new Exception("Ce numéro est déja utilisé.");
  }

  $manager->createGrid($grid);
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?create");
  exit;
}

$_SESSION["success"] = "Grille créée avec succès !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
