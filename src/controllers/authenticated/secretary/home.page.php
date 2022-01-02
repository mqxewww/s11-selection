<?php

/*
* "home" page controller :
* Retrieves all grids and displays them in the view
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

try {
  $list = $manager->getList();
} catch (Exception $e) {
  $_SESSION["error"] = "Une erreur est survenue lors du chargement des données.";
}

// Display the view
require_once "./src/views/pages/secretary/secretaryHome.php";

# If an error message was set
if (isset($_SESSION["error"])) unset($_SESSION["error"]);

exit;
