<?php

/*
* "update" page redirection controller :
* Update a grid
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {
  !empty($_GET["gridId"])
    ? $id = htmlspecialchars($_GET["gridId"])
    : throw new Exception();

  !empty($_POST["oldGridNum"])
    ? $oldNum = htmlspecialchars($_POST["oldGridNum"])
    : throw new Exception("`Numéro` est manquant.");

  !empty($_POST["modGridNum"])
    ? $num = htmlspecialchars($_POST["modGridNum"])
    : throw new Exception("`Numéro de grille` est manquant.");

  !empty($_POST["modGridName"])
    ? $name = htmlspecialchars($_POST["modGridName"])
    : throw new Exception("`Nom de l'étudiant` est manquant.");

  !empty($_POST["modGridFirstname"])
    ? $firstname = htmlspecialchars($_POST["modGridFirstname"])
    : throw new Exception("`Prénom de l'étudiant` est manquant.");

  !empty($_POST["modGridDiploma"])
    ? $diploma = htmlspecialchars($_POST["modGridDiploma"])
    : throw new Exception("`Diplome de l'étudiant` est manquant.");

  !empty($_POST["modGridWork"])
    ? $work = htmlspecialchars($_POST["modGridWork"])
    : throw new Exception("`Travail de l'étudiant` est manquant.");

  !empty($_POST["modGridAbs"])
    ? $abs = htmlspecialchars($_POST["modGridAbs"])
    : throw new Exception("`Taux d'absence de l'étudiant` est manquant.");

  !empty($_POST["modGridAtt"])
    ? $att = htmlspecialchars($_POST["modGridAtt"])
    : throw new Exception("`Attitude / Comportement de l'étudiant` est manquant.");

  !empty($_POST["modGridStudy"])
    ? $study = htmlspecialchars($_POST["modGridStudy"])
    : throw new Exception("`Études supérieures ?` est manquant.");

  !empty($_POST["modGridPpview"])
    ? $ppview = htmlspecialchars($_POST["modGridPpview"])
    : throw new Exception("`Avis du professeur principal` est manquant.");

  !empty($_POST["modGridProview"])
    ? $proview = htmlspecialchars($_POST["modGridProview"])
    : throw new Exception("`Avis du proviseur` est manquant.");

  !empty($_POST["modGridCoverletter"])
    ? $coverletter = htmlspecialchars($_POST["modGridCoverletter"])
    : throw new Exception("`Qualité lettre de motivation` est manquant.");

  $comment = htmlspecialchars($_POST["modGridComment"]);

  $grid = new Grid([
    "id" => $id,
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

  # If number is different & is already taken
  if ($grid->getNumber() !== $oldNum && !$manager->isNumberAvailable($grid->getNumber())) {
    throw new Exception("Ce numéro est déja utilisé.");
  }

  $manager->updateGrid($grid);
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?update&gridId=" . $_GET["gridId"]);
  exit;
}

$_SESSION["success"] = "Grille mise à jour !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
