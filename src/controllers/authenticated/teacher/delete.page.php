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
  $id = isset($_GET["gridId"]) && !empty($_GET["gridId"])
    ? htmlspecialchars($_GET["gridId"])
    : throw new Exception("L'Id grille n'est pas valide.");

  $grid = $manager->getOne(intval($id));
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit;
}

// Display the view
require_once "./src/views/pages/teacher/teacherDelete.php";
