<?php

/*
* "update" page controller :
* Retrieves grid information to be modified and displays it in the view
* Redirects to home page in case of a loading error
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {
  !empty($_GET["gridId"])
    ? $id = htmlspecialchars($_GET["gridId"])
    : throw new Exception("L'Id grille n'est pas valide.");

  $grid = $manager->getOne(intval($id));
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit;
}

// Display the view
require_once "./src/views/pages/teacher/teacherUpdate.php";

# If an error message was set
if (isset($_SESSION["error"])) unset($_SESSION["error"]);

exit;
