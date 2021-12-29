<?php

/*
* "update" page redirection controller :
* Update a grid
* Redirect to main router according to result
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

$id = htmlspecialchars($_GET["gridId"]);
$num = htmlspecialchars($_POST["modGridNum"]);
$name = htmlspecialchars($_POST["modGridName"]);
$firstname = htmlspecialchars($_POST["modGridFirstname"]);
$diploma = htmlspecialchars($_POST["modGridDiploma"]);
$work = htmlspecialchars($_POST["modGridWork"]);
$abs = htmlspecialchars($_POST["modGridAbs"]);
$att = htmlspecialchars($_POST["modGridAtt"]);
$study = htmlspecialchars($_POST["modGridStudy"]);
$ppview = htmlspecialchars($_POST["modGridPpview"]);
$proview = htmlspecialchars($_POST["modGridProview"]);
$coverletter = htmlspecialchars($_POST["modGridCoverletter"]);
$comment = htmlspecialchars($_POST["modGridComment"]);
$mark = $diploma + $work + $abs + $att + $study + $ppview + $proview + $coverletter;

$grid = new Grid([
  "id" => intval($id),
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
  $manager->updateGrid($grid);
} catch (Exception $e) {
  header("Location: ?update&gridId=" . $_GET["gridId"] . "&failed");
  exit;
}

header("Location: ?modified");
exit;
