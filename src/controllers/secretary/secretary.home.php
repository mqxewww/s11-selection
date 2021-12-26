<?php

/*
* "home" page controller :
* Retrieves all grids and displays them in the view
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

$list = $manager->getList();

// View
require_once "./src/views/secretary/secretaryHome.php";
