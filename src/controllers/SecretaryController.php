<?php

namespace Selection\Controllers;

use Selection\Errors\DatabaseError;
use Selection\Libs\App;
use Selection\Models\GridManager;

class SecretaryController
{
  private static GridManager $gridManager;

  public function __construct()
  {
    $this::$gridManager = new GridManager();
  }

  /**
   * `View Display` Secretary > home.
   */
  public function home(): void
  {
    try {
      # Called in the view.
      $list = $this::$gridManager->getList();
    } catch (DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      $list = array();
    }

    require_once BASE_VIEW_PATH . "secretary/home.php";

    App::clearView();
  }

  /**
   * `Backend Call` Download the candidates' ranking in CSV format.
   */
  public function download(): void
  {
    try {
      $list = $this::$gridManager->getList();
    } catch (DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      $list = array();
    }

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

    exit;
  }
}
