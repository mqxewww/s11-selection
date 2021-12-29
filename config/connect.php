<?php

//======================================================================
// CONNECTION TO MYSQL DATABASE
//======================================================================

$database = new PDO(
  "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
  DB_USER,
  DB_PWD
);
$database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
