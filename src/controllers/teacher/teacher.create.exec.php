<?php

/*
* "create" page redirection controller :
* Create a new grid
* Redirect to main router according to result
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

$num = htmlspecialchars($_POST["newGridNum"]);
$name = htmlspecialchars($_POST["newGridName"]);
$firstname = htmlspecialchars($_POST["newGridFirstname"]);
$diploma = htmlspecialchars($_POST["newGridDiploma"]);
$work = htmlspecialchars($_POST["newGridWork"]);
$abs = htmlspecialchars($_POST["newGridAbs"]);
$att = htmlspecialchars($_POST["newGridAtt"]);
$study = htmlspecialchars($_POST["newGridStudy"]);
$ppview = htmlspecialchars($_POST["newGridPpview"]);
$proview = htmlspecialchars($_POST["newGridProview"]);
$coverletter = htmlspecialchars($_POST["newGridCoverletter"]);
$comment = htmlspecialchars($_POST["newGridComment"]);
$mark = $diploma + $work + $abs + $att + $study + $ppview + $proview + $coverletter;

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
  "mark" => $mark
]);

try {
  $manager->createGrid($grid);
} catch (Exception $e) {
  header("Location: ?create&failed");
  exit;
}

header("Location: ?created");
exit;
