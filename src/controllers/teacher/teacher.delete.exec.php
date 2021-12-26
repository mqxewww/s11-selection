<?php

/*
* "delete" page redirection controller :
* Delete a grid
* Redirect to main router according to result
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

$id = htmlspecialchars($_POST["delGridId"]);

try {
  $manager->deleteGrid(intval($id));
} catch (Exception $e) {
  header("Location: ?delete&gridId=" . $_GET["gridId"] . "&failed");
  exit;
}

header("Location: ?deleted");
exit;
