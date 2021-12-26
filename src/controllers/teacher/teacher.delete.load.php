<?php

/*
* "delete" page controller :
* Retrieves grid information to be deleted and displays it in the view
* Redirects to home page in case of a loading error
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {

  # Undefined teacher id
  if (!isset($_GET["gridId"])) throw new Exception();

  $id = htmlspecialchars($_GET["gridId"]);

  $grid = $manager->getOne(intval($id));
} catch (Exception $e) {
  header("Location: ?");
  exit;
}

// View
require_once "./src/views/teacher/teacherDelete.php";
