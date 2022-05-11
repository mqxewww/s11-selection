<?php

namespace Selection\Controllers;

use Selection\Errors\DatabaseError;
use Selection\Errors\InvalidInput;
use Selection\Errors\NonMatchingPasswords;
use Selection\Libs\App;
use Selection\Models\Account;
use Selection\Models\AccountManager;

class AdminController
{
  private static AccountManager $accountManager;

  public function __construct()
  {
    $this::$accountManager = new AccountManager();
  }

  /**
   * `View Display` Admin > home.
   */
  public function home(): void
  {
    try {
      # Called in the view.
      $list = $this::$accountManager->getList();
    } catch (DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      $list = array();
    }

    require_once BASE_VIEW_PATH . "/admin/home.php";

    App::clearView();
  }

  /**
   * `View Display` Admin > creation.
   */
  public function creation(): void
  {
    require_once BASE_VIEW_PATH . "/admin/creation.php";

    App::clearView();
  }

  /**
   * `View Display` Admin > changes.
   */
  public function changes(): void
  {
    try {
      $id = App::getFilter("accountId", "URL");

      # Called in the view.
      $account = $this::$accountManager->getOne(intval($id));
    } catch (DatabaseError | InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("/admin/home");
    }

    require_once BASE_VIEW_PATH . "admin/changes.php";

    App::clearView();
  }

  /**
   * `View Display` Admin > deletion.
   */
  public function deletion(): void
  {
    try {
      $id = App::getFilter("accountId", "URL");

      # Called in the view.
      $account = $this::$accountManager->getOne(intval($id));
    } catch (DatabaseError | InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("/admin/home");
    }

    require_once BASE_VIEW_PATH . "admin/deletion.php";

    App::clearView();
  }

  /**
   * `Backend Call` New account insertion.
   */
  public function insertAccount(): void
  {
    try {
      $log = App::postFilter("newAccountLog", "Identifiant");
      $pass = App::postFilter("newAccountPwd", "Mot de passe");
      $passConf = App::postFilter("newAccountPwdConf", "Confirmation du mot de passe");
      $type = App::postFilter("newAccountType", "Type de compte");

      $account = new Account([
        "login" => $log,
        "password" => $pass,
        "type" => $type
      ]);

      # If password & verification password are not equal.
      if ($passConf !== $account->getPassword()) throw new NonMatchingPasswords();

      $this::$accountManager->verifyLogin($account->getLogin());
      $this::$accountManager->createAccount($account);
    } catch (InvalidInput | NonMatchingPasswords | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("/admin/creation");
    }

    $_SESSION["success"] = "Compte créé avec succès !";
    App::redirect("/admin/home");
  }

  /**
   * `Backend Call` Account updates.
   */
  public function updateAccount(): void
  {
    try {
      $id = App::getFilter("accountId", "URL");
      $oldLog = App::postFilter("oldAccountLog", "Identifiant");
      $log = App::postFilter("modAccountLog", "Identifiant");
      $pass = App::postFilter("modAccountPwd", "Mot de passe");
      $passConf = App::postFilter("modAccountPwdConf", "Confirmation du mot de passe");
      $type = App::postFilter("modAccountType", "Type de compte");

      $account = new Account([
        "id" => intval($id),
        "login" => $log,
        "password" => $pass,
        "type" => $type
      ]);

      # If password & verification password are not equal.
      if ($passConf !== $account->getPassword()) throw new NonMatchingPasswords();

      # If new login is different.
      if ($account->getLogin() !== $oldLog) $this::$accountManager->verifyLogin($account->getLogin());

      $this::$accountManager->updateAccount($account);
    } catch (InvalidInput | NonMatchingPasswords | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("/admin/changes?accountId=" . $_GET["accountId"]);
    }

    $_SESSION["success"] = "Compte mis à jour !";
    App::redirect("/admin/home");
  }

  /**
   * `Backend Call` Account deletion.
   */
  public function deleteAccount(): void
  {
    try {
      $id = App::postFilter("delAccountId", "URL");

      $this::$accountManager->deleteAccount(intval($id));
    } catch (InvalidInput | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("/admin/deletion?accountId=" . $_GET["accountId"]);
    }

    $_SESSION["success"] = "Compte supprimé !";
    App::redirect("/admin/home");
  }
}
