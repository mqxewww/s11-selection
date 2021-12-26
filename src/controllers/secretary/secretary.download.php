<?php

/*
* "download" page controller :
* Create csv file from database
*/

require_once "./src/models/Grid.php";
require_once "./src/models/GridManager.php";
$manager = new GridManager($database);

$list = $manager->getList();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output = fopen("php://output", "w");

fputcsv(
  $output,
  [
    "Numero",
    "Nom",
    "Prenom",
    "Diplome",
    "Travail",
    "Absence",
    "Attitude",
    "Etudes superieures",
    "Avis professeur principal",
    "Avis proviseur",
    "Lettre de motivation",
    "Commentaires",
    "Note finale"
  ]
);

foreach ($list as $grid) {
  fputcsv(
    $output,
    [
      $grid->getNumber(),
      $grid->getName(),
      $grid->getFirstname(),
      $grid->getDiploma(),
      $grid->getWork(),
      $grid->getAbsence(),
      $grid->getAttitude(),
      $grid->getStudy(),
      $grid->getPpview(),
      $grid->getProview(),
      $grid->getCoverletter(),
      $grid->getComment(),
      $grid->getMark()
    ]
  );
}
fclose($output);
