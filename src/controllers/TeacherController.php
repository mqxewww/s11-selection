<?php

namespace Selection\Controllers;

use Selection\Errors\DatabaseError;
use Selection\Errors\InvalidInput;
use Selection\Libs\App;
use Selection\Models\AccountManager;
use Selection\Models\Grid;
use Selection\Models\GridManager;

class TeacherController
{
  private static AccountManager $accountManager;
  private static GridManager $gridManager;

  public function __construct()
  {
    $this::$accountManager = new AccountManager();
    $this::$gridManager = new GridManager();
  }

  /**
   * `View Display` Teacher > home.
   */
  public function home(): void
  {
    try {
      # Called in the view.
      $account = $this::$accountManager->getOne($_SESSION["id"]);
    } catch (DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
    }

    try {
      # Called in the view.
      $list = $this::$gridManager->getList();
    } catch (DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      $list = array();
    }

    require_once BASE_VIEW_PATH . "/teacher/home.php";

    App::clearView();
  }

  /**
   * `View Display` Teacher > creation.
   */
  public function creation(): void
  {
    require_once BASE_VIEW_PATH . "/teacher/creation.php";

    App::clearView();
  }

  /**
   * `View Display` Teacher > changes.
   */
  public function changes(): void
  {
    try {
      $id = App::getFilter("gridId", "URL");

      # Called in the view.
      $grid = $this::$gridManager->getOne(intval($id));
    } catch (DatabaseError | InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("teacher/home");
    }

    require_once BASE_VIEW_PATH . "teacher/changes.php";

    App::clearView();
  }

  /**
   * `View Display` Teacher > deletion.
   */
  public function deletion(): void
  {
    try {
      $id = App::getFilter("gridId", "URL");

      # Called in the view.
      $grid = $this::$gridManager->getOne(intval($id));
    } catch (DatabaseError | InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("teacher/home");
    }

    require_once BASE_VIEW_PATH . "teacher/deletion.php";

    App::clearView();
  }

  /**
   * `Backend Call` New grid insertion.
   */
  public function insertGrid(): void
  {
    try {
      $num = App::postFilter("newGridNum", "Numéro de grille");
      $name = App::postFilter("newGridName", "Nom de l'étudiant");
      $firstname = App::postFilter("newGridFirstname", "Prénom de l'étudiant");
      $diploma = App::postFilter("newGridDiploma", "Diplome de l'étudiant");
      $work = App::postFilter("newGridWork", "Travail de l'étudiant");
      $abs = App::postFilter("newGridAbs", "Taux d'absence de l'étudiant");
      $att = App::postFilter("newGridAtt", "Attitude / Comportement de l'étudiant");
      $study = App::postFilter("newGridStudy", "Études supérieures");
      $ppview = App::postFilter("newGridPpview", "Avis du professeur principal");
      $proview = App::postFilter("newGridProview", "Avis du proviseur");
      $coverletter = App::postFilter("newGridCoverletter", "Qualité lettre de motivation");
      $comment = htmlspecialchars($_POST["newGridComment"]);

      $grid = new Grid([
        "number" => $num,
        "name" => $name,
        "firstname" => $firstname,
        "diploma" => $diploma,
        "work" => $work,
        "absence" => $abs,
        "attitude" => $att,
        "study" => $study,
        "ppview" => $ppview,
        "proview" => $proview,
        "coverletter" => $coverletter,
        "comment" => $comment,
        "mark" => $diploma + $work + $abs + $att + $study + $ppview + $proview + $coverletter
      ]);

      $this::$gridManager->verifyNumber($grid->getNumber());
      $this::$gridManager->createGrid($grid);
    } catch (InvalidInput | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("teacher/creation");
    }

    $_SESSION["success"] = "Grille créée avec succès !";
    App::redirect("teacher/home");
  }

  /**
   * `Backend Call` Grid updates.
   */
  public function updateGrid(): void
  {
    try {
      $id = App::getFilter("gridId", "URL");
      $oldNum = App::postFilter("oldGridNum", "Numéro");
      $num = App::postFilter("modGridNum", "Numéro de grille");
      $name = App::postFilter("modGridName", "Nom de l'étudiant");
      $firstname = App::postFilter("modGridFirstname", "Prénom de l'étudiant");
      $diploma = App::postFilter("modGridDiploma", "Diplome de l'étudiant");
      $work = App::postFilter("modGridWork", "Travail de l'étudiant");
      $abs = App::postFilter("modGridAbs", "Taux d'absence de l'étudiant");
      $att = App::postFilter("modGridAtt", "Attitude / Comportement de l'étudiant");
      $study = App::postFilter("modGridStudy", "Études supérieures");
      $ppview = App::postFilter("modGridPpview", "Avis du professeur principal");
      $proview = App::postFilter("modGridProview", "Avis du proviseur");
      $coverletter = App::postFilter("modGridCoverletter", "Qualité lettre de motivation");
      $comment = htmlspecialchars($_POST["modGridComment"]);

      $grid = new Grid([
        "id" => $id,
        "number" => $num,
        "name" => $name,
        "firstname" => $firstname,
        "diploma" => $diploma,
        "work" => $work,
        "absence" => $abs,
        "attitude" => $att,
        "study" => $study,
        "ppview" => $ppview,
        "proview" => $proview,
        "coverletter" => $coverletter,
        "comment" => $comment,
        "mark" => $diploma + $work + $abs + $att + $study + $ppview + $proview + $coverletter
      ]);

      # If new number is different.
      if ($grid->getNumber() !== $oldNum) $this::$gridManager->verifyNumber($grid->getNumber());

      $this::$gridManager->updateGrid($grid);
    } catch (InvalidInput | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("teacher/changes?gridId=" . $_GET["gridId"]);
    }

    $_SESSION["success"] = "Grille mise à jour !";
    App::redirect("teacher/home");
  }

  /**
   * `Backend Call` Grid deletion.
   */
  public function deleteGrid(): void
  {
    try {
      $id = App::postFilter("delGridId", "URL");

      $this::$gridManager->deleteGrid(intval($id));
    } catch (InvalidInput | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("teacher/deletion?gridId=" . $_GET["gridId"]);
    }

    $_SESSION["success"] = "Grille supprimée !";
    App::redirect("teacher/home");
  }
}
