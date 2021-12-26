<?php

//======================================================================
// APPLICATION CONFIGURATION
//======================================================================

define("DB_HOST", "localhost:3307");
define("DB_NAME", "selection");
define("DB_USER", "");
define("DB_PWD", "");

$database = new PDO(
  "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
  DB_USER,
  DB_PWD
);
$database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
