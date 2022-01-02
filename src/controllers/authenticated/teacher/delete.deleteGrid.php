<?php

/*
* "delete" page redirection controller :
* Delete a grid
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {
  !empty($_POST["delGridId"])
    ? $id = htmlspecialchars($_POST["delGridId"])
    : throw new Exception("L'Id grille n'est pas valide.");

  $manager->deleteGrid(intval($id));
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?delete&gridId=" . $_GET["gridId"]);
  exit;
}

$_SESSION["success"] = "Grille supprimée !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
